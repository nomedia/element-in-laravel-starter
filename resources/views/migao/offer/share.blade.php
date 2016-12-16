

<script type="text/javascript"src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js "></script>

<script type="text/javascript"src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js "></script>

<script type="text/javascript"charset="utf-8">


$.ajax({
    url: 'http://api.megoal.org/oAuth/get_jssdk_ticket?url='+encodeURIComponent(document.URL)+'&state='+encodeURIComponent(document.URL)+',snsapi_userinfo',
    type: 'get',
    dataType: 'json',
}).done(function(data) {

console.log(data.appid);
response=data;
    console.log(data);
      wx.config({
      	  
    appId: response.appid,
    timestamp: response.timestamp,
    nonceStr: response.nonsence,
    signature: response.signature,
    jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
      ]
  });
wx.ready(function () {
     var shareData = {
    title: '更专业、更公开、更高效',
    desc: '晒出你的OFFER，让更多人尖叫', 
    link: response.share_url,
    imgUrl: 'http://7u2odd.com1.z0.glb.clouddn.com/icon175x175.jpeg'
  };
     wx.onMenuShareAppMessage(shareData);
     wx.onMenuShareTimeline(shareData);
     wx.onMenuShareQQ(shareData);
     wx.onMenuShareWeibo(shareData);
});





}).fail(function() {
    console.log("error")
}).always(function() {
    console.log("complete")
})



</script>