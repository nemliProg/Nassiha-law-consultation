<template>
  <div class="page-cover">
    <div class="left-side">
      <h1>Your Solution<br />Legal Consultacy</h1>
      <p>
        We are here to help you in your legal cases and increase your knowledge
        with legal advice from experts.
      </p>
      <router-link to="" @click="toSearch"
        ><button>Consult a lawyer</button></router-link
      >
    </div>
    <div class="right-side">
      <img src="../../assets/images/wepik-2022227-181652-removebg.png" alt="" />
    </div>
  </div>
</template>

<script>
export default {
  name: "Cover",
  methods: {
    toSearch() {
      if (window.localStorage.getItem("role") == "client") {
        this.$router.push("/search");
      } else if (window.localStorage.getItem("role") == "lawyer") {
        this.$router.push("/chat");
      } else {
        this.$router.push("/authenticate/client/login");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.page-cover {
  display: grid;
  grid-template: 1fr / 2fr 1fr;
  justify-content: space-between;
  .left-side {
    padding: 0px 0px 0px 70px;

    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 20px;
    font-family: $source;
    h1 {
      font-size: 48px;
      font-family: $tenor;
      font-weight: 200;
      color: $primary-color;
    }
    p {
      color: #4f4f4f;
      font-size: 24px;
    }
    a button {
      font-family: inherit;
      background-color: $primary-color;
      color: white;
      padding: 15px 40px;
      letter-spacing: 3px;
      border: none;
      border-radius: 5px;

      cursor: pointer;
    }
  }
  .right-side {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    img {
      width: 60%;
    }
  }
}
@include before-tablet {
  .page-cover {
    display: grid;
    grid-template: 1fr /1fr;
    justify-content: space-between;
    .right-side {
      display: none !important;
    }
    .left-side {
      padding: 20px 0px 20px 70px !important;
      @include tablet {
        padding: 20px 0px 20px 40px !important;
      }
      display: flex;
      justify-content: center;
      flex-direction: column;
      font-family: $source;
      h1 {
        font-size: 36px;
        font-family: $tenor;
        font-weight: 200;
      }
      p {
        color: #4f4f4f;
        font-size: 20px;
        padding: 0px 150px 0px 0px;
      }
      a button {
        font-family: inherit;
      }
    }
  }
}
</style>