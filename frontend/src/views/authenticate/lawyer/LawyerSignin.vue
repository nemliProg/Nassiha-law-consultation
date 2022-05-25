<template>
  <h1>Lawyer</h1>
  <div class="container">
    <div class="side form-section">
      <h3>Sign In</h3>
      <form data-multi-step>
        <div data-step class="card active">
          <div class="names">
            <label for="firstName">
              First Name
              <input type="text" v-model="fname" id="firstName" required />
            </label>
            <label for="lastName">
              Last Name
              <input type="text" v-model="lname" id="lastName" required />
            </label>
          </div>
          <label for="phone">
            Phone
            <input type="tel" v-model="tel" id="phone" required />
          </label>
          <label for="email">
            Email
            <input type="email" v-model="email" id="email" required/>
          </label>
          <label for="password">
            Password
            <input type="password" v-model="password" id="password" required/>
          </label>
          <button data-next>Next</button>
          <span
            >I have already an account
            <router-link to="/authenticate/lawyer/login"
              >here</router-link
            ></span
          >
        </div>
        <div data-step class="card">
          <label for="photo">
            Profile Photo
            <input type="file" @change="selectFile" id="photo" />
          </label>
          <label for="bar">
            Bar
            <select v-model="bar" id="bar" required>
              <option v-for="(city, i) in cities" :value="city" :key="i">
                {{ city }}
              </option>
            </select>
          </label>
          <div class="form-group">
            <input type="checkbox" v-model="cassation" id="cassation"/>
            <label for="cassation">Admitted to the Court of Cassation</label>
          </div>
          <label for="adress">
            adress
            <input type="text" v-model="adress" id="adress" required/>
          </label>
          <div>
            <div class="btns">
              <button data-previous>previous</button>
              <input type="submit" value="Submit" data-submit />
            </div>
            <span
              >I have already an account
              <router-link to="/authenticate/lawyer/login"
                >here</router-link
              ></span
            >
          </div>
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
  name: "LawyerSignin",
  components: {},
  data() {
    return {
      fname : '',
      lname : '',
      tel : '',
      email : '',
      password : '',
      photo : null,
      bar : '',
      cassation : false,
      adress : ''

    }
  },
  methods : {
    selectFile(event) {
      this.photo = event.target.files[0];
      console.log(this.photo);
    },
  },
  mounted() {
    const multiStepForm = document.querySelector("[data-multi-step]");
    const formSteps = [...multiStepForm.querySelectorAll("[data-step]")];
    let currentStep = formSteps.findIndex((step) => {
      return step.classList.contains("active");
    });

    if (currentStep < 0) {
      currentStep = 0;
      formSteps[currentStep].classList.add("active");
    }

    multiStepForm.addEventListener("click", (e) => {
      let incrementor
      if (e.target.matches("[data-next]")) {
        e.preventDefault();
        incrementor = 1
      } else if (e.target.matches("[data-previous]")) {
        e.preventDefault();
        incrementor = -1
      }else if (e.target.matches("[data-submit]")) {
        console.log("form submitted")
        return
      }
      if (incrementor == null) return

      const inputs = [...formSteps[currentStep].querySelectorAll("input")]
      const allValid = inputs.every(input => input.reportValidity())
      if (allValid){
        currentStep += incrementor
        showCurrentStep()
      }
    });
    function showCurrentStep() {
      formSteps.forEach((step, index) => {
        step.classList.toggle("active", index === currentStep);
      });
    }
  },
  computed: {
    cities() {
      return this.$store.state.cities;
    },
    skills() {
      return this.$store.state.skills;
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
    height: 550px;
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
      & > .card {
        @include d-flex(column);
        gap: 0.5rem;
        display: none;
        &.active {
          display: flex;
        }
        & .names {
          @include d-flex;
          width: 60%;
          gap: 5px;
        }
        & label {
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
          select {
            width: 100%;
            padding: 5px 10px;
            outline: none;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
          }
          input[type="file"] {
            background-color: white;
            color: $secondary-color;
          }
        }
        button[data-next],
        button[data-previous] {
          font-family: inherit;
          border: none;
          outline: none;
          width: 40%;
          padding: 6px;
          background-color: $secondary-color;
          color: white;
          font-size: 1.2rem;
        }
        .form-group {
          width: 60%;
          @include d-flex;
          & > input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
          }
          & > label {
            width: 100%;
            position: relative;
            cursor: pointer;
            color: white;
            font-size: 1.1rem;
            &:before {
              content: "";
              -webkit-appearance: none;
              background-color: transparent;
              border: 2px solid white;
              box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
                inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
              padding: 10px;
              display: inline-block;
              position: relative;
              vertical-align: middle;
              cursor: pointer;
              margin-right: 5px;
            }
          }
          & input:checked + label:after {
            content: "";
            display: block;
            position: absolute;
            top: 2px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
          }
        }
        .btns {
          width: 100%;
          @include d-flex;
          margin-top: 2rem;
          gap: 5px;
        }
        span:last-child {
          color: white;
          font-weight: 300;
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
  @include tablet {
    .poster {
      display: none;
    }
    .side {
      width: min(350px,90%);
    }
  }
}
</style>
