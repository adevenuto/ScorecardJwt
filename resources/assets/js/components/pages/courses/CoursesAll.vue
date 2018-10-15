<template>
  <div>
    <h1>All Courses</h1>
    <Courses/>
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