import "babel-polyfill";

class Twitterwall {

    constructor(rootElementId = "tweet-container") {

        this.singleTweetClassNames = 'tweet col-xs-12 col-sm-6 col-lg-4';
        this.twitterImageSize = 'small';
        this.fetchLocation = '/tweets';

        let rootElement = document.getElementById(rootElementId);

        this.fetchTweets().then((tweets) => {
            tweets.map((tweet) => {
                let el = this.createTweetElement(tweet);
                rootElement.appendChild(el);
            });

            new Masonry( rootElement, {
                itemSelector: '.tweet'
            });
        });

    }

    fetchTweets() {
        let promise = new Promise((resolve, reject) => {
            let request = new XMLHttpRequest();
            request.open('GET', this.fetchLocation, true);

            request.onload = () => {
                if (request.status >= 200 && request.status < 400) {
                    try {
                        resolve(JSON.parse(request.responseText));
                    } catch(e) {
                        reject();
                    }
                } else {
                    reject();
                }
            }

            request.send();
        });

        return promise;
    }

    createTweetElement(tweet) {
        tweet = this.decorateTweetText(tweet);

        let tweetContainer = document.createElement('div');
        tweetContainer.className = this.singleTweetClassNames;

        tweetContainer = this.prependImage(tweet, tweetContainer);

        let tweetText = document.createElement('div');
        tweetText.className = 'tweet__text';
        tweetText.innerHTML = tweet.full_text;

        tweetContainer.appendChild(tweetText);

        return tweetContainer;
    }

    decorateTweetText(tweet) {
        tweet = Object.assign({}, tweet);

        tweet = this.handleUsernames(tweet);
        tweet = this.handleUrls(tweet);
        tweet = this.handleNewLines(tweet);
        tweet = this.handleHashtags(tweet);

        return tweet;
    }

    handleUsernames(tweet) {
        tweet = Object.assign({}, tweet);

        let mentions = tweet.entities && tweet.entities.user_mentions;
        if (mentions) {
            mentions.map((mention) => {
                let replace = `<a class="tweet__text--username" href="https://www.twitter.com/${mention.screen_name}" target="_blank">@${mention.screen_name}</a>`;

                tweet.full_text = tweet.full_text.replace('@' + mention.screen_name, replace);
            });
        }

        return tweet;
    }

    handleHashtags(tweet) {
        tweet = Object.assign({}, tweet);

        let hashtags = tweet.entities && tweet.entities.hashtags;

        if (hashtags) {
            hashtags.map((hashtag) => {
                let replace = `<span class="tweet__text--hashtag">#${hashtag.text}</span>`;
                tweet.full_text = tweet.full_text.replace('#' + hashtag.text, replace);
            });
        }

        return tweet;
    }

    handleUrls(tweet) {
        tweet = Object.assign({}, tweet);

        let urls = tweet.entities && tweet.entities.urls;

        if (urls) {
            urls.map((url) => {
                let replace = `<a href="${url.url}" target="_blank" title="${url.expanded_url}">${url.display_url}</a>`;
                tweet.full_text = tweet.full_text.replace(url.url, replace);
            });
        }

        return tweet;
    }

    prependImage(tweet, tweetContainer) {
        tweet = Object.assign({}, tweet);

        let media = tweet.entities && tweet.entities.media && tweet.entities.media[0];

        if (media) {
            let ratio = Math.ceil((media.sizes[this.twitterImageSize].h / media.sizes[this.twitterImageSize].w) * 100);

            let linkWrapper = document.createElement('a');
            linkWrapper.href = media.url;
            linkWrapper.target = '_blank';

            let imageContainer = document.createElement('div');
            imageContainer.style.backgroundImage = `url(${media.media_url}:${this.twitterImageSize})`;
            imageContainer.style.paddingTop = ratio + "%";
            imageContainer.className = 'tweet__image';

            linkWrapper.appendChild(imageContainer);

            tweetContainer.insertBefore(linkWrapper, tweetContainer.firstChild);
        }

        return tweetContainer;
    }

    handleNewLines(tweet) {
        tweet = Object.assign({}, tweet);

        tweet.full_text = tweet.full_text.replace(/\n/g, '<br>');
        return tweet;
    }
}

window.twitterWall = new Twitterwall();
