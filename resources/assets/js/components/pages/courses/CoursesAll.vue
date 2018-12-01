<template>
  <div class="container">
    <div class="col-md-12">
      <h1>All Courses</h1>
      <Courses/>
    </div>
  </div>
</template>

<script>
  import Courses from '../../courses/courses';
  export default {
    name: "view-courses",
    components: {Courses}
  }
</script>

<style scoped>

</style>