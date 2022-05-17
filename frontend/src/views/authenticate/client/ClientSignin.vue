<template>
  <h1>Client</h1>
  <div class="container">
    <div class="side form-section">
      <h3>Sign In</h3>
      <form>
        <label for="photo">
          Profile Photo
          <input type="file" name="photo" id="photo" />
        </label>
        <div class="names">
          <label for="firstName">
          First Name
          <input type="text" name="firstName" id="firstName" />
        </label>
        <label for="lastName">
          Last Name
          <input type="text" name="lastName" id="lastName" />
        </label>
        </div>
        <label for="phone">
          Phone
          <input type="tel" name="phone" id="phone" />
        </label>
        <label for="email">
          Email
          <input type="email" name="email" id="email" />
        </label>
        <label for="password">
          Password
          <input type="password" name="password" id="password" />
        </label>
        <div>
          <input type="submit" value="Submit" />
          <span>I have already an account <router-link to="/authenticate/client/login">here</router-link></span>
        </div>
      </form>
    </div>
    <div class="side poster">
      <img
        src="../../../assets/illustrations/welcoming.svg"
        alt="login illustration"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "ClientSignin",
  components: {},
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
    height: 700px;
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
      .names {
        @include d-flex;
        width: 60%;
        gap: 5px;
      }
      label {
        @include d-flex(column, center, flex-start);
        gap: 5px;
        color: white;
        width: 60%;
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
        input[type = "file"] {
          background-color: white;
          color: $secondary-color;
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