<template>

<div>
	
 <div class="el-form-item"  ><label class="el-form-item__label" style="width: 100px;">
  {{title}}：


  </label><div class="el-form-item__content" style="margin-left: 100px;"><div class="el-input"><!----><!---->

       <input type="text" v-model="vmodels.name"  class="form-control" value="">

  <!----><!----></div><div class="el-form-item__error">
    
      <span v-for="error in formErrors" class="error text-danger">
                 
                    {{ error}}

                    </span>

  </div></div></div>

</div>
</template>

<script>
export default {
  props: ['list','title','formErrors','vmodels','name'],


   watch: {
    // 一个计算属性的 getter
    vmodels: function () {
    //	alert('33');
      // `this` 指向 vm 实例
      eval("this.list."+this.name+"=this.vmodels")
      return 1;
    }
  }
}
</script>
