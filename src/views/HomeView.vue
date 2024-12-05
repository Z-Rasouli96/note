<template>
  <div class="home">
    <loginApp msg="Note App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import loginApp from '@/components/LoginComponent.vue'

export default {
  name: 'HomeView',
  components: {
    loginApp
  }
}
</script>
