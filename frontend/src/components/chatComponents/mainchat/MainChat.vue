<template>
  <div class="mainChat" :style="{ 'margin-left': sidebarWidth }">
    <div class="interlocutor">
      <div class="avatar">
        <img
          src="https://www.simonebertollini.com/wp-content/uploads/2017/10/simone_2.jpg"
          alt=""
        />
      </div>
      <div class="name">
        <h3>Maître Rachid Tarafi</h3>
      </div>
    </div>
    <div class="messages">
      <Message direction="left" />
      <Message direction="right" />
    </div>
    <div class="send-message" :style="{ 'margin-left': sidebarWidth }">
      <input type="text" placeholder="Type a message..." />
      <button>
        <i class="fas fa-paper-plane"></i>
      </button>
    </div>
  </div>
</template>

<script>
import { sidebarWidth } from "../sidebar/state";
import Message from "./mainchatComponents/Message.vue";
export default {
  name: "MainChat",
  components: {
    Message,
  },
  setup() {
    return {
      sidebarWidth,
    };
  },
};
</script>

<style lang="scss" scoped>
.mainChat {
  position: relative;
  background-color: $bg-color;
  height: calc(100vh - 70px);
  .messages {
    padding: 20px;
  }
  .interlocutor {
    background-color: $secondary-color;
    @include d-flex(row, flex-start, center);
    padding: 10px 20px;
    gap: 3%;
    .avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      overflow: hidden;
      img {
        width: 100%;
      }
    }
    .name {
      h3 {
        font-family: $tenor;
        font-size: 1.2rem;
        font-weight: 300;
        color: white;
      }
    }
  }
  .send-message {
    padding: 15px 30px;
    background-color: $secondary-color;
    position: fixed;
    @include d-flex(row, center, center);
    bottom: 0;
    left: 0;
    right: 0;
    input[type="text"]{
      padding: 3px 20px;
      border-radius: 50px;
      outline: none;
      border: none;
      font-size: 1.2rem;
      width: 90%;
    }
    button {
      margin-left: 10px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: $primary-color;
      border: none;
      outline: none;
      text-align: center;
      i {
        color: white;
        font-size: 1.2rem;
      }
    }
  }
}
</style>