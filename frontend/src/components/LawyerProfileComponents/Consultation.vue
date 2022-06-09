<template>
  <div class="container">
    <div class="consultation">
      <h2>Write a your question</h2>
      <form @submit.prevent="ask">
        <textarea
          v-model="question"
          name="question"
          id="question"
          placeholder="Write Your question here"
        ></textarea>
        <input type="submit" value="Send" />
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Consultation",
  props:["lawyer","v"],
  data() {
    return {
      question: "",
    };
  },
  methods: {
    async ask() {
      const config = {
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      let data = new FormData();
      data.append("idLawyer", this.$route.params.id);
      data.append("idClient", localStorage.getItem('id'));
      data.append("content", this.question);
      axios
        .post(
          "http://localhost/nassiha-law-consultation/consultationscontroller/add",
          data,
          config
        )
        .then((response) => {
          console.log(response.data);
          this.$router.push("/chat");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped >
.consultation {
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
      border-radius: 15px;
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