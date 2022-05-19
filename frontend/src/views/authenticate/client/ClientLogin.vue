<template>
  <h1>Client</h1>
  <div class="container">
    <div class="side poster">
      <img
        src="../../../assets/illustrations/login.svg"
        alt="login illustration"
      />
    </div>
    <div class="side form-section">
      <h3>Login</h3>
      <form @submit.prevent="login">
        <label for="email">
          Email
          <input type="email" name="email" id="email" v-model="email" />
        </label>
        <label for="password">
          Password
          <input
            type="password"
            name="password"
            id="password"
            v-model="password"
          />
        </label>
        <div>
          <input type="submit" value="Submit" />
          <span
            >create an account
            <router-link to="/authenticate/client/signin"
              >here</router-link
            ></span
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ClientLogin",
  components: {},
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async login() {
      let config = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };
      const data = {
        email: this.email,
        password: this.password,
      };
      const formData = new FormData();
      Object.keys(data).forEach((key) => {
        formData.append(key, data[key]);
      });
      console.log(data);
      axios
        .post(
          "http://localhost/nassiha-law-consultation/clientscontroller/login",
          formData,
          config
        )
        .then((response) => {
          let data = response.data;
          // window.localStorage.setItem('token',data.token)
          // window.localStorage.setItem('id',data.user.id)
          console.log(data);
          // this.$router.push({path: '/'});
          // this.$store.dispatch("setIsLoggedIn", true);
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>

<style lang="scss" scoped>
h1 {
  font-family: $tenor;
  margin: 50px auto;
  width: max-content;
}
.container {
  margin: 50px auto 60px;
  @include d-flex;
  .side {
    @include d-flex(column);
    width: min(500px, 40%);
    height: 450px;
    gap: 50px;
    h3 {
      color: white;
      font-weight: 300;
      font-size: 1.5rem;
    }
    img {
      width: 80%;
      margin: 0px auto;
    }
    button {
      width: 60%;
      padding: 15px;
      outline: none;
      border: none;
      background-color: $bg-color;
      font-size: 1.2rem;
      cursor: pointer;
    }
  }
  .poster {
    background-color: $secondary-color;
  }
  .form-section {
    background-color: $tertiary-color;
    form {
      @include d-flex(column);
      gap: 2rem;
      width: 100%;
      font-family: $tenor;
      label {
        @include d-flex(column, center, flex-start);
        gap: 5px;
        color: white;
        width: 55%;
        font-size: 1.2rem;
        font-family: inherit;
        input {
          width: 100%;
          padding: 5px 10px;
          outline: none;
          border: none;
          border-radius: 10px;
          font-size: 1.1rem;
        }
      }
      div:last-child {
        @include d-flex(column);
        width: inherit;
        font-family: inherit;
        input[type="submit"] {
          font-family: inherit;
          border: none;
          outline: none;
          width: 40%;
          padding: 6px;
          background-color: $secondary-color;
          color: white;
          font-size: 1.2rem;
        }
        span:last-child {
          color: white;
          font-weight: 300;
          margin-top: 10px;
          a {
            color: inherit;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.2rem;
            &:hover {
              color: $secondary-color;
            }
          }
        }
      }
    }
  }
}
</style>