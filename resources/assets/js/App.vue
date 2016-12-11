<template>
  <div class="wrapper">
    <topo></topo>

    <sidebar></sidebar>

    <router-view></router-view>

    <rightbar></rightbar>

    <rodape></rodape>

  </div>
</template>

<script>
import topo from './components/shared/topo.vue'
import sidebar from './components/shared/sidebar.vue'
import rodape from './components/shared/rodape.vue'
import rightbar from './components/shared/rightbar.vue'





export default {
  components: {
    topo,
    sidebar,
    rodape,
    rightbar,

  }
}
</script>

<style>

.el-loading-mask{
  z-index: 4;
}
@import url('/static/css/AdminLTE.css');
@import url('/static/css/bootstrap.min.css');
@import url('/static/css/skins/_all-skins.min.css');

.content{
  min-height: 800px
}
.toolbar{

    padding: 10px 0px 10px 1px;

}

.toolbar .right{
      padding: 10px 0px 10px 1px;
   float: right;

}
.toolbar .left{
      padding: 10px 0px 10px 1px;
   float: left;

}

.el-loading-mask{
  z-index: 4;
}
</style>
