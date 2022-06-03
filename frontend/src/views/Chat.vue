<template>
  <Sidebar :me="me"/>
  <MainChat :me="me"/>
</template>

<script>
import Sidebar from "../components/chatComponents/sidebar/Sidebar.vue";
import MainChat from "../components/chatComponents/mainchat/MainChat.vue";
import axios from "axios";

export default {
  name: "Chat",
  components: {
    Sidebar,
    MainChat,
  },
  data() {
    return {
      me: {},
    };
  },
  methods: {
    async getLawyer() {
      let id = localStorage.getItem("id");
      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      axios
        .get(
          `http://localhost/nassiha-law-consultation/lawyerscontroller/getLawyer/${id}`,
          config
        )
        .then((response) => {
          console.log(response.data);
          this.me = response.data;
        })
        .catch((err) => console.log(err));
    },
    async getClient() {
      let id = localStorage.getItem("id");
      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      axios
        .get(
          `http://localhost/nassiha-law-consultation/clientscontroller/getClient/${id}`,
          config
        )
        .then((response) => {
          console.log(response.data);
          this.me = response.data;
        })
        .catch((err) => console.log(err));
    },
    
  },
  mounted() {
    if (window.localStorage.getItem('role') == 'lawyer') {
      this.getLawyer();
    }else{
      this.getClient();
    }
  },
};
</script>
  
<style lang="scss" scoped>
</style>