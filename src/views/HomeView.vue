<template>
  <div class="home">
    <NotePage msg="Note App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import NotePage from '@/components/NotePage.vue'

export default {
  name: 'HomeView',
  components: {
    NotePage
  }
}
</script>
