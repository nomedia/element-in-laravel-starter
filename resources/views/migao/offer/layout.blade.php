<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>2017年美国本科Offer</title>
    <meta name="viewport"
        content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    

           <link rel="stylesheet" href="https://unpkg.com/mint-ui/lib/style.css">
      <!-- Font Awesome -->
  <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">

           <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!-- 引入样式 -->
<link rel="stylesheet" href="https://unpkg.com/mint-ui/lib/style.css">
 <!-- 先引入 Vue -->
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <!-- 引入组件库 -->
  <script src="https://unpkg.com/mint-ui/lib/index.js"></script>
  <script src="//cdn.bootcss.com/vue-resource/1.0.3/vue-resource.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<!-- 引入样式 -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">

<link href="//cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">

<!-- 引入组件库 -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script>
  var domain="http://localhost:8000/";
</script>

<style> 
     @yield('css')
html {
  touch-action: manipulation;
}

/**
 * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/)
 * http://cssreset.com
 */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header,
menu, nav, output, ruby, section, summary,
time, mark, audio, video, input {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font-weight: normal;
    vertical-align: baseline;
    text-decoration: none;
}

/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, menu, nav, section {
    display: block;
}

body {
    line-height: 1;
}

blockquote, q {
    quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content: none;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
}

/* custom */
a {
    color: #7e8c8d;
    text-decoration: none;
    -webkit-backface-visibility: hidden;
}

li {
    list-style: none;
}

::-webkit-scrollbar {
    width: 5px;
    height: 5px;
}

::-webkit-scrollbar-track-piece {
    background-color: rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 6px;
}

::-webkit-scrollbar-thumb:vertical {
    height: 5px;
    background-color: rgba(125, 125, 125, 0.7);
    -webkit-border-radius: 6px;
}

::-webkit-scrollbar-thumb:horizontal {
    width: 5px;
    background-color: rgba(125, 125, 125, 0.7);
    -webkit-border-radius: 6px;
}

html, body {
    width: 100%;
}

body {
    -webkit-text-size-adjust: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
  .mint-header {
    -ms-flex-align: center;
    align-items: center;
    background-color: #ffffff;
    border-bottom: 1px solid #ddd;
    color: #3790d3;
}

.mint-button--default {
    color: #656b79;
    background-color: #3790d3;
    box-shadow: 0 0 1px #71aeff;
    color: white;
    border-radius: 0px;
}

.mint-field .mint-cell-title {
    width: 139px;
    -webkit-box-flex: 0;
    -ms-flex: none;
    flex: none;
}
.col-md-12{
padding-top: 15px;

}
.button_group{
  padding-top: 15px;

}
.mint-search {
    height: 100%;
    height: 50px;
}
.mint-cell {
    background-color: #fff;
    box-sizing: border-box;
    color: inherit;
    min-height: 40px;
    display: block;
    overflow: hidden;
    position: relative;
    text-decoration: none;
}
hr {
    margin-top: 20px;
    margin-bottom: 6px;
    border: 0;
    border-top: 1px solid #eee;
}

.mint-button--large {
    display: block;
    width: 100%;
    margin-top: 43px;
}
.mint-cell-wrapper {
  background-color: #fff;
    padding-left: 0px;
        background-image: inherit;

}  .page-search {
    height: 100%;
  }
a{
  color: #ddd;
  text-decoration:none;
}

a:hover{
 
  text-decoration:none;
}
.h4_padd{
   padding-top:10px;
}

.button_check{
      border: 1px solid #2c91d7;
    color: #2c91d7;
}

.btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
    color: #2c91d7;
    background-color: #fff;
    border-color: #2c91d7;
}
  .web{
    background-color: #fff
  }
  .mint-header {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;

}


.bg{

position: absolute;
}

.share_flow{
  z-index: 9;
  position: absolute;
  top: 0px
}

.share_success{

  z-index: 11;
  position: absolute;
     width: 80%;
         left: 10%;
         top:5%;
  
}

.high{
    color: #a71400;
    text-align: center;
    top: 37.5%;
    z-index: 12;
}
.name{
      color: #a71400;
    text-align: center;
    top: 43.5%;
    font-size: 28px;
    z-index: 12;
    position: absolute;
    text-align: center;
    width: 100%;
}
.num{
  
}
  


.congratulation{
    color: #000;
    text-align: center;
    top: 59.5%;
   
    z-index: 12;
    width: 100%;
   
}
.congratulation p span{
  color: #a71400;
  padding-right: 10px;
}

.congratulation p {

  padding: 3px;
}
.body{
  width: 100%;
  margin: 0 auto;
}
.school_name{
      color: #c6a06f;
    
    text-align: center;
    top: 17.5%;
    z-index: 12;
}

.luo {
    -webkit-animation: luo 1s linear 1 forwards 0.5s;
    opacity: 0;
}
.fdetop {
    -webkit-animation: top 2s linear infinite forwards 0.2s;
}
.p1_t2 {
    width: 13.6rem;
    top: -0.8rem;
    left: 2.4rem;
}

.text{
      position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
  
    overflow: hidden;
}
.home_ul{


}
.c999{
  color:#999;
}
.float_right{
  float: right;
}
.home_ul li{
      height: 43px;
    border-bottom: 1px solid #ddd;
    line-height: 43px;
        overflow: hidden;

}

.offerForm{

width: 47%;
float: right;
}
.myOffer{
width: 47%;
float: left;
}
.btn_group{

  padding-top: 10px;
  padding-bottom: 10px;
}
body{
  text-decoration: none
}
html{
  text-decoration: none
}
.mint-header{
  height: 50px
}
a{ text-decoration: none} 
　 a:link { text-decoration: none}
　　 a:active { text-decoration: none}
　　 a:hover { text-decoration: none} 
　　 a:visited { text-decoration: none}
</style>

  </head>
  <body>
    <div id="app">
      @yield('content')

<div style="display: none">

<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261000965'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1261000965' type='text/javascript'%3E%3C/script%3E"));</script>
  
</div>
    </div>
    <!-- built files will be auto injected -->
  </body>


</html>



@yield('scirpt')
  