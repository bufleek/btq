<?php
    include "static/classes/index.php";
?>

<!DOCTYPE html>
<html lang="en">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/index.css">
    <title>Shoe Hub</title>
</head>
<body>
    <div class="body">
        <div class="main_slide">
        <script type="text/javascript" src="static/slider/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="static/slider/js/jssor.slider.min.js"></script>
    <script type="text/javascript" src="static/js/slider.js"></script>
   
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="static/slider/svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <?php
                $object = new index;
                $object->slide();
            ?>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/002.jpg" />
                <div data-u="thumb">Slide Description 002</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/003.jpg" />
                <div data-u="thumb">Slide Description 003</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/004.jpg" />
                <div data-u="thumb">Slide Description 004</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/005.jpg" />
                <div data-u="thumb">Slide Description 005</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/006.jpg" />
                <div data-u="thumb">Slide Description 006</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/007.jpg" />
                <div data-u="thumb">Slide Description 007</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/008.jpg" />
                <div data-u="thumb">Slide Description 008</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/009.jpg" />
                <div data-u="thumb">Slide Description 009</div>
            </div>
            <div>
                <img data-u="image" src="static/slider/img/gallery/980x380/010.jpg" />
                <div data-u="thumb">Slide Description 010</div>
            </div>
            <div style="background-color:#ff7c28;">
                <div style="position:absolute;top:50px;left:50px;width:450px;height:62px;z-index:0;font-size:16px;color:#000000;line-height:24px;text-align:left;padding:5px;box-sizing:border-box;">Title,<br />
                    description.
                </div>
                <div data-u="thumb">More content</div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:980px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div data-u="slides">
                <div data-u="prototype" style="position:absolute;top:0;left:0;width:980px;height:50px;">
                    <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>
    <!-- #endregion Jssor Slider End -->

        </div>
   <div class="categories">
   <h3 class="categories">CATEGORIES</h3>
       <div class="category">
        <h3 class="category">Mens Wear<span>More</span></h3>
       </div>
   </div>
    



    </div>  
</body>
</html>
