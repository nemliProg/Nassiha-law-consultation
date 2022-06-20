<template>
  <div class="container header">
    <div class="profile-header">
      <div class="img-holder">
        <img :src="lawyer?.photo ?? lawyerAxios.photo" alt="profile photo" />
      </div>
      <div class="profile-info">
        <h3>
          Maître {{ lawyer?.lname ?? lawyerAxios.lname }}
          {{ lawyer?.fname ?? lawyerAxios.fname }}
        </h3>
        <p>Lawyer at the bar of {{ lawyer?.bar ?? lawyerAxios.bar }}</p>
        <p>
          <span class="icon"
            ><img src="../assets/icons/adressIcon.svg" alt="localisation icon"
          /></span>
          {{ lawyer?.adress ?? lawyerAxios.adress }}
        </p>
        <p>
          <span class="icon"
            ><img
              src="../assets/icons/emailAdress.svg"
              alt="localisation icon" /></span
          >{{ lawyer?.email ?? lawyerAxios.email }}
        </p>
      </div>
    </div>
    <div class="nav">
      <ul>
        <li>
          <img src="../assets/icons/profileNav/User.svg" />
          <p>Profile</p>
        </li>
        <li>
          <img src="../assets/icons/profileNav/experience-icon.svg" />
          <p>Experience</p>
        </li>
        <li>
          <img src="../assets/icons/profileNav/comment_icon.svg" />
          <p>Comment</p>
        </li>
        <li>
          <img src="../assets/icons/profileNav/legalAdvice_icon.svg" />
          <p>Legal Consultation</p>
        </li>
      </ul>
    </div>
  </div>
  <Profile v-if="section === 0" :lawyer="lawyer ?? lawyerAxios" v="0" />
  <Experience v-else-if="section === 1" :lawyer="lawyer ?? lawyerAxios" v="0" />
  <Comment v-else-if="section === 2" v="0" />
  <Consultation
    v-else-if="section === 3"
    :lawyer="lawyer ?? lawyerAxios"
    v="0"
  />
</template>
<script>
import Experience from "../components/LawyerProfileComponents/Experience.vue";
import Profile from "../components/LawyerProfileComponents/Profile.vue";
import Comment from "../components/LawyerProfileComponents/Comment.vue";
import Consultation from "../components/LawyerProfileComponents/Consultation.vue";
import axios from "axios";

export default {
  name: "LawyerProfile",
  data() {
    return {
      section: 0,
      lawyerAxios: {},
    };
  },
  components: {
    Experience,
    Profile,
    Comment,
    Consultation,
  },
  methods: {
    async getLawyer() {
      console.log("im here");
      let id = this.$route.params.id;
      console.log(id);
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
          this.lawyerAxios = response.data;
        })
        .catch((err) => console.log(err));
    },
  },
  mounted() {
    const li = document.querySelectorAll(".nav ul li");
    li.forEach((item, i) => {
      item.addEventListener("click", () => {
        this.section = i;
      });
    });
    if (this.lawyer === undefined) {
      this.getLawyer();
    }
  },
  computed: {
    lawyer() {
      return this.$store.state.lawyers.find(
        (lawyer) => lawyer.id == this.$route.params.id
      );
    },
  },
};
</script>

<style lang="scss">
.container {
  margin: 20px 15%;
  @include phone {
    margin: 20px 5%;
  }
}
.header {
  .profile-header {
    @include d-flex(row, flex-start);
    @include tablet {
      flex-direction: column !important;
      justify-content: center !important;
      align-items: center !important;
      .profile-info {
        text-align: center;
        p {
          font-size: 0.6rem;
          .icon {
            margin-right: 0px;
          }
        }
      }
    }
    gap: 20px;
    .img-holder {
      width: 150px;
      height: 150px;
      overflow: hidden;
      border-radius: 50%;
      img {
        width: 100%;
      }
    }
    .profile-info {
      p {
        font-size: 0.8rem;
        .icon {
          margin-right: 10px;
        }
      }
    }
  }
  .nav {
    background-color: $primary-color;
    border-radius: 35px;
    width: 80%;
    margin: 20px auto;
     @include tablet {
      width: 90% !important;
      
    }
    ul {
      list-style: none;
      display: grid;
      padding: 10px;
      grid-template: 1fr / repeat(3, 1fr) 2fr;
      @include tablet {
        grid-template: repeat(2, 1fr) / repeat(2, 1fr);
        li{
          p{
            text-align: center;
          }
        }
      }
      li {
        cursor: pointer;
        @include d-flex(column);
        gap: 5px;
        img {
          width: 50px;
        }
        p {
          color: white;
          font-size: 0.9rem;
        }
      }
    }
  }
}
</style>
