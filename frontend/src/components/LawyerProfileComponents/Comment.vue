<template>
  <div class="container">
    <div class="comment">
      <h2 v-if="v == 0" >Write a Comment</h2>
      <h2 v-else style="margin-bottom : 15px">Comments</h2>
      <form v-if="v == 0">
        <textarea name="comment" id="comment" placeholder="Write Your Comment here"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
    <div class="comments">
      <div class="comment" v-for="(comment,i) in comments" :key="i">
        {{comment.content}}
        <span class="left">
          <div class="img-holder">
            <img :src="comment.photo" :alt="comment.lname">
          </div>
          <div class="info">
            <span class="name">{{comment.lname}} {{comment.fname}}</span>
            <span class="time">{{comment.created_at}}</span>
          </div>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name : 'Comment',
  props:["comments","v"]
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
.comments {
  &>.comment {
    background-color: $secondary-color;
    border-radius: 10px;
    padding: 10px 10px  50px 10px;
    height: max-content;
    margin-bottom: 10px;
    position: relative;
    .left {
      position: absolute;
      left: 10px;
      bottom: 5px;
      @include d-flex(row,flex-start,center);
      gap: 5px;
      .img-holder {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        overflow: hidden;
        img{
          width: 100%;
        }
      }
      .info {
        @include d-flex(column,center,flex-start);
        font-size: .8rem;
      }
    }
  }
}
</style>