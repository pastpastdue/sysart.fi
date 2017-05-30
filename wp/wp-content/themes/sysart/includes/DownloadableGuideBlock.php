<?php
class DownloadableGuideBlock {

    public function __construct($content_order, $title, $subtitle, $desc, $image_id, $button_text, $url) {
        $this->content_order = $content_order;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->desc = $desc;
        $this->image_id = $image_id;
        $this->button_text = $button_text;
        $this->url = $url;
        $img = wp_get_attachment_image($this->image_id, 'large', false, array('class' => 'image image--responsive'));
        $image_first_styles = $this->content_order == 'image_first' ? 'downloadable-guide-image-first' : '';

        //A fix to make image appear above text on mobile screens when content order is text-first
        $text_first_responsive_classes = $this->content_order == 'text_first' ? 'guide-block-desktop col-sm-6' : 'col-xs-12 col-sm-6';
        $this->text_first_mobile_html = '';

        $this->text_column = <<<EOC
<div class="col-xs-12 col-sm-6 item item--text $image_first_styles">
    <div class="item__content child-margins">
        <div class="title title--highlight">{$this->title}</div>
        <h1 class="title title--medium">{$this->subtitle}</h1>
        <p>{$this->desc}</p>
        <div>
            <a href="{$this->url}" class="button">
                {$this->button_text}
            </a>
        </div>
    </div>
</div>
EOC;

        $this->image_column = <<<EOC
<div class="$text_first_responsive_classes item downloadable-guide--image">
   <div class="responsive-container">
    <div class="dummy"></div>

    <div class="img-container">
        <div class="centerer"></div>
        $img
    </div>
</div>
</div>
EOC;
        //A fix to make image appear above text on mobile screens when content order is text-first
        if ($this->content_order == 'text_first') {
            $this->text_first_mobile_html =  <<<EOC
<div class="col-xs-12 guide-block-mobile item downloadable-guide--image">
   <div class="responsive-container">
    <div class="dummy"></div>

    <div class="img-container">
        <div class="centerer"></div>
        $img
    </div>
</div>
</div>
EOC;
        }
    }

    
    public function __toString() {

        if ($this->content_order == 'text_first') {
            return <<<EOC
<article class="row no-gutter downloadable-guide">
    {$this->text_first_mobile_html}
    {$this->text_column}
    {$this->image_column}
</article>
EOC;
        }
        
        else { 
            return <<<EOC
<article class="row no-gutter downloadable-guide">
   {$this->image_column}
   {$this->text_column}
</article>
EOC;

        }
    }
}