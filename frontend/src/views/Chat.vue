<template>
  <Sidebar :me="me" :consultations="consultations" :setOther="setOther" />
  <MainChat v-if="other" :key="key" :me="me" :cons="other" :trigger="trigger" :conn="conn" />
  <Choose v-else />
</template>

<script>
import Sidebar from "../components/chatComponents/sidebar/Sidebar.vue";
import MainChat from "../components/chatComponents/mainchat/MainChat.vue";
import Choose from "../components/chatComponents/mainchat/Choose.vue";
import axios from "axios";

export default {
  name: "Chat",
  components: {
    Sidebar,
    MainChat,
    Choose,
  },
  data() {
    return {
      me: {},
      conn : {},
      other: null,
      consultations: [],
      key: null,
      trigger: 10,
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
          this.me = response.data;
        })
        .catch((err) => console.log(err));
    },
    async getClientConsultations() {
      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      const id = localStorage.getItem("id");
      await axios
        .get(
          `http://localhost/nassiha-law-consultation/consultationscontroller/getConsultationsbyclient/${id}`,
          config
        )
        .then((response) => {
          this.consultations = response.data;
        })
        .catch((err) => console.log(err));
    },
    async getLawyerConsultations() {
      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      const id = localStorage.getItem("id");
      await axios
        .get(
          `http://localhost/nassiha-law-consultation/consultationscontroller/getConsultationsbylawyer/${id}`,
          config
        )
        .then((response) => {
          this.consultations = response.data;
        })
        .catch((err) => console.log(err));
    },
    setOther(cons) {
      this.key = Math.random();
      this.other = cons;
    },
    triggerset() {
      this.trigger = Math.random()*100;
    },


  },
  mounted() {
    let id = localStorage.getItem("id");
    this.conn = new WebSocket(`ws://localhost:8080/`);

    this.conn.onopen = (event) => {
      console.log("connected");
    };
    this.conn.onmessage = (e) => {
      // console.log("message sent");
      let obj = JSON.parse(e.data);
      console.log(obj.to);
      if (obj.to == id) {
        this.triggerset();
      }
    };
    this.conn.onclose = (event) => {
      console.log("disconnected");
    };

    if (window.localStorage.getItem("role") == "lawyer") {
      this.getLawyer();
      this.getLawyerConsultations();
    } else {
      this.getClient();
      this.getClientConsultations();
    }
  },
};
</script>
  
<style lang="scss" scoped>
</style>