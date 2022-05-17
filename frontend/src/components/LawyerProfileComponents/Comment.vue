<template>
  <div class="container">
    <div class="comment">
      <h2>Write a Comment</h2>
      <form>
        <textarea name="comment" id="comment" placeholder="Write Your Comment here"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name : 'Comment',
}
</script>

<style lang="scss" scoped>
.comment {
  width: 80%;
  margin: auto;
  &>h2{
    text-align: center;
    color: $tertiary-color;
  }
  form{
    margin-top: 20px;
    textarea {
      max-width: 60%;
      min-width: 60%;
      min-height: 100px;
      max-height: 250px;
      margin: auto;
      padding: 10px;
      display: block;
      outline: none;
      border: none;
      color: blue;
    }
    input[type="submit"]{
      background-color: $primary-color;
      color: white;
      padding: 5px 30px;
      border: none;
      display: block;
      margin: 10px auto;
      cursor: pointer;
    }
  }
}
</style>