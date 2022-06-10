<template>
  <div class="mainChat" :style="{ 'margin-left': sidebarWidth }">
    <div class="interlocutor">
      <div class="avatar">
        <img
          :src="cons.photo"
          alt=""
        />
      </div>
      <div class="name">
        <h3>Maître {{cons.fname}} {{cons.lname}}</h3>
      </div>
    </div>
    <div class="messages">
      <Message v-for="(message,i) in messages" :message="message" :key="i" />
    </div>
    <form class="send-message" :style="{ 'margin-left': sidebarWidth }" @submit.prevent="sendMessage">
      <input type="text" placeholder="Type a message..." v-model="message" />
      <button>
        <i class="fas fa-paper-plane"></i>
      </button>
    </form>
  </div>
</template>

<script>
import { sidebarWidth } from "../sidebar/state";
import Message from "./mainchatComponents/Message.vue";
import axios from "axios";

export default {
  name: "MainChat",
  components: {
    Message,
  },
  data() {
    return {
      messages: null,
      message: "",
    };
  },
  props: {
    cons: {
      type: Object,
      required: true,
    },
    conn: {
      type: Object,
      required: true,
    },
    trigger: {
      type: Number,
      required: true,
    },
  },  
  methods: {
    async getMessages() {
      console.log(this.cons.id);
      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      await axios
        .get(
          `http://localhost/nassiha-law-consultation/messagesController/getMessagesByConsultation/${this.cons.id}`,
          config
        )
        .then((response) => {
          this.messages = response.data;
        })
        .catch((err) => console.log(err));

        const messagesDiv = document.getElementsByClassName("messages")[0];
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    },
    async sendMessage() {


      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      var data = new FormData();
      data.append("content", this.message);
      data.append("from", localStorage.getItem("id"));
      data.append("to", this.cons.to);
      data.append("idConsultation", this.cons.id);
      await axios
        .post(
          `http://localhost/nassiha-law-consultation/messagesController/addmessage`,
          data,
          config
        )
        .then((response) => {
          console.log(response.data);
          this.conn.send(response.data);
          this.getMessages();
          this.message = "";
        })
        .catch((err) => console.log(err));
    },
  },
  mounted() {
    console.log("mounted")
    this.getMessages();
  },
  setup() {
    return {
      sidebarWidth,
    };
  },
  watch: {
    trigger(newVal, oldVal) {
        this.getMessages();
    },
  },
};
</script>

<style lang="scss" scoped>
.mainChat {
  background-color: $bg-color;
  top: 69px;
  height: calc(100vh - 70px);
  transition: 0.3s ease;
  .messages {
    height: calc(100% - 70px);
    padding: 20px 20px 80px 20px;
    overflow-y: scroll;
    scroll-behavior: smooth;
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
    transition: 0.3s ease;
    @include d-flex(row, center, center);
    bottom: 0;
    left: 0;
    right: 0;
    input[type="text"] {
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
      cursor: pointer;
      i {
        color: white;
        font-size: 1.2rem;
      }
    }
  }
}
</style>