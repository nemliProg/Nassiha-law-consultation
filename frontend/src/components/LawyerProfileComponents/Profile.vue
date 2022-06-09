<template>
  <div class="container">
    <div class="profile">
      <h2>Maître {{ lawyer.lname }} {{ lawyer.fname }}</h2>
      <p>Lawyer at the bar of {{ lawyer.bar }}</p>
      <h3>
        Skills
        <img
          @click="addSkill"
          v-if="v == 1"
          src="../../assets/icons/addIcon.svg"
          alt="add"
        />
      </h3>
      <div class="skills">
        <p v-for="(skill, i) in lawyer.skills" :key="i">
          {{ skill.skill }}
          <img
            v-if="v == 1"
            src="../../assets/icons/deleteIcon.svg"
            alt="delete"
            @click="deleteSkill(skill.id)"
          />
        </p>
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
      options: {},
      
    };
  },
  methods: {
    async deleteSkill(idSkill) {
      await this.$swal
        .fire({
          title: "Are you sure?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then( (result) => {
          if (!result.isConfirmed) return;
            var data = new FormData();
            data.append("idLawyer", localStorage.getItem("id"));
            data.append("idSkill", idSkill);
             axios
              .post(
                "http://localhost/nassiha-law-consultation/skillscontroller/deleteskill",
                data,
                {
                  headers: {
                    Authorization: "Bearer " + localStorage.getItem("token"),
                  },
                }
              )
              .then((response) => {
                console.log(response.data);
                this.$swal.fire(`${response.data.message}!`, "", "success");
                this.$store.commit("DELETE_SKILL", idSkill);
              }).catch((error) => {
                console.log(error);
                console.log('hada error')
              });
        })
    },
    async addSkill() {
      let opts = {};
      let config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      };
      await axios
        .get(
          `http://localhost/nassiha-law-consultation/skillscontroller/leftskills/${localStorage.getItem(
            "id"
          )}`,
          config
        )
        .then((response) => {
          response.data.map((skill) => {
            opts[skill.id] = skill.skill;
          });
        })
        .catch((err) => console.log(err));

      await this.$swal.fire({
        title: "Add a skill",
        input: "select",
        inputOptions: opts,
        inputPlaceholder: "Select a skill",
        showCancelButton: true,
        inputValidator: (value) => {
          return new Promise(async (resolve) => {
            if (value) {
              var data = new FormData();
              data.append("idLawyer", localStorage.getItem("id"));
              data.append("idSkill", value);
              await axios
                .post(
                  `http://localhost/nassiha-law-consultation/skillscontroller/addskill`,
                  data,
                  config
                )
                .then((response) => {
                  let obj = {
                    id : value,
                    skill : this.skills[value]
                  }
                  this.$store.commit("ADD_SKILL", obj);
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
  },
  computed: {
    skills() {
      return this.$store.state.skills;
    },
  },
};
</script>

<style lang="scss" scoped>
.profile {
  width: 80%;
  margin: auto;
  & > h3 {
    padding: 15px 0px 5px;
    display: flex;
    align-items: center;
    img {
      width: 20px;
      height: 20px;
      margin-left: 10px;
      cursor: pointer;
    }
  }
  .skills {
    p {
      margin-bottom: 5px;
      display: flex;
      align-items: center;
      img {
        width: 20px;
        height: 20px;
        margin-left: 10px;
        cursor: pointer;
      }
    }
  }
}
</style>