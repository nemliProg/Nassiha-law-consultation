<template>
  <div class="container">
    <div class="experience">
      <div class="diplomes">
        <h3>
          <img src="../../assets/icons/education.png" alt="" />Diplomes
          <img
            @click="addExperience"
            v-if="v == 1"
            src="../../assets/icons/addIcon.svg"
            alt="add"
          />
        </h3>
        <div class="inside">
          <div v-for="(dip, i) in lawyer.diplomas" :key="i" class="diploma">
            <p>{{ dip.diploma }}</p>
            <p>{{ dip.university }}</p>
          </div>
        </div>
      </div>
      <div class="experiences">
        <h3>
          <img src="../../assets/icons/mallette.png" alt="" />Experiences
          <img
            @click="addExperience"
            v-if="v == 1"
            src="../../assets/icons/addIcon.svg"
            alt="add"
          />
        </h3>
        <div class="inside">
          <div v-for="(exp, i) in lawyer.experiences" :key="i" class="exp">
            <p>Bar of Lawyers of {{ exp.bar }}</p>
            <p v-if="i == lawyer.experiences.length - 1">
              {{ exp._from }} <span class="scnd-color">/</span> Today
            </p>
            <p v-else>
              {{ exp._from }} <span class="scnd-color">/</span> {{ exp._to }}
            </p>
          </div>
        </div>
      </div>
      <div class="languages">
        <h3>
          <img src="../../assets/icons/traduire.png" alt="" />Languages
          <img
            @click="addLanguage"
            v-if="v == 1"
            src="../../assets/icons/addIcon.svg"
            alt="add"
          />
        </h3>
        <div class="inside">
          <p v-for="(lang, i) in lawyer.languages" :key="i">
            <span v-if="lang.name == 'Arabic'"
              ><img
                src="../../assets/icons/languages/maroc.png"
                alt="arab" />Arabic<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
            <span v-else-if="lang.name == 'French'"
              ><img
                src="../../assets/icons/languages/la-france.png"
                alt="Frensh" />French<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
            <span v-else-if="lang.name == 'English'"
              ><img
                src="../../assets/icons/languages/royaume-uni.png"
                alt="english" />English<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
            <span v-else-if="lang.name === 'Spanish'"
              ><img
                src="../../assets/icons/languages/spain.png"
                alt="spanish" />Spanish<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
            <span v-else-if="lang.name === 'Italian'"
              ><img
                src="../../assets/icons/languages/italy.png"
                alt="italian" />Italian<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
            <span v-else-if="lang.name === 'Dutch'"
              ><img
                src="../../assets/icons/languages/netherlands.png"
                alt="italian" />Dutch<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
            <span v-else-if="lang.name === 'Germen'"
              ><img
                src="../../assets/icons/languages/germany.png"
                alt="italian" />German<img
                v-if="v == 1"
                src="../../assets/icons/deleteIcon.svg"
                alt="delete"
                @click="deleteLanguage(lang.id)"
            /></span>
          </p>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Profile",
  props: ["lawyer", "v"],
  data() {
    return {
      languages: [
        "Arabic",
        "English",
        "French",
        "German",
        "Italian",
        "Dutch",
        "Spanish",
      ],
    };
  },
  methods: {
    async addLanguage() {
      let langss = this.languages.filter(
        (lng) => !this.langs.find((lang) => lang.name == lng)
      );
      langss = langss.map((lang) => {
        let obj = {};
        obj[lang] = lang;
        console.log(obj);
        return obj;
      });
      await this.$swal.fire({
        title: "Add a Language",
        input: "select",
        inputOptions: langss,
        inputPlaceholder: "Select a Language",
        showCancelButton: true,
        inputValidator: (value) => {
          return new Promise(async (resolve) => {
            if (value) {
              var data = new FormData();
              data.append("idLawyer", localStorage.getItem("id"));
              data.append("name", value);
              console.log(value);
              await axios
                .post(
                  `http://localhost/nassiha-law-consultation/LanguagesController/addlanguage`,
                  data,
                  {
                    headers: {
                      "Content-Type": "application/json",
                      Authorization: "Bearer " + localStorage.getItem("token"),
                    },
                  }
                )
                .then((response) => {
                  let obj = {
                    name: value
                    // id: response.data.id,
                  };
                  console.log(obj,response.data);
                  this.$store.commit("ADD_LANG", obj);
                  this.$swal.fire({
                    icon: "success",
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1500,
                  });
                })
                .catch((err) => console.log(err));
              resolve();
            } else {
              resolve("You need to select a skill :)");
            }
          });
        },
      });
    },
    async deleteLanguage(idLanguage) {
      await this.$swal
        .fire({
          title: "Are you sure?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (!result.isConfirmed) return;
          var data = new FormData();
          data.append("id", idLanguage);
          axios
            .post(
              "http://localhost/nassiha-law-consultation/LanguagesController/deletelanguage",
              data,
              {
                headers: {
                  Authorization: "Bearer " + localStorage.getItem("token"),
                },
              }
            )
            .then((response) => {
              this.$swal.fire(`${response.data.message}!`, "", "success");
              this.$store.commit("DELETE_LANG", idLanguage);
            })
            .catch((error) => {
              console.log(error);
            });
        });
    },
    addExperience() {},
  },
  computed: {
    langs() {
      return this.$store.state.lawyer.languages;
    },
  },
};
</script>

<style lang="scss" scoped>
.experience {
  width: 80%;
  margin: auto;
  & > div > h3 {
    @include d-flex(row, flex-start);
    gap: 6px;
    & > img {
      width: 30px;
    }
    img:last-child {
      width: 20px;
      height: 20px;
      margin-left: 10px;
      cursor: pointer;
    }
  }
  & > div:first-child > h3 > img {
    width: 40px;
    margin-left: -5px;
  }
  & > div > .inside {
    padding: 5px 10px 15px;
    .exp {
      background-color: $secondary-color;
      width: 50%;
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 10px;
      color: white;
    }
    .diploma {
      background-color: $secondary-color;
      width: 50%;
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 10px;
      color: white;
    }
  }
  .diplomes {
    p {
      margin-top: 10px;
    }
  }
  .experiences {
    p {
      margin-top: 10px;
      .scnd-color {
        color: $tertiary-color;
      }
    }
  }
  .languages {
    p {
      span {
        margin-top: 10px;
        @include d-flex(row, flex-start);
        gap: 10px;
        img {
          width: 2.5rem;
        }
        img:last-child {
          width: 20px;
          height: 20px;
          margin-left: -5px;
          cursor: pointer;
        }
      }
    }
  }
}
</style>