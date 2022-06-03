<template>
<p style="background-color: blue;">{{ lawyer }}x</p>
  <div class="container header">
    <div class="profile-header">
      <div class="img-holder">
        <img
          :src="lawyer.photo"
          alt="profile photo"
        />
      </div>
      <div class="profile-info">
        <h3>Maître {{ lawyer.lname  }} {{ lawyer.fname }}</h3>
        <p>Lawyer at the bar of {{ lawyer.bar }}</p>
        <p>
          <span class="icon"
            ><img src="../assets/icons/adressIconWhite.svg" alt="localisation icon"
          /></span>
          {{ lawyer.adress }}
        </p>
        <p>
          <span class="icon"
            ><img
              src="../assets/icons/emailAdress.svg"
              alt="localisation icon" /></span
          >{{ lawyer.email }}
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
  <Profile v-if="section === 0" :lawyer="lawyer" v=1 />
  <Experience v-else-if="section === 1" :lawyer="lawyer" v=1 />
  <Comment v-else-if="section === 2" :lawyer="lawyer" v=1 />
</template>
<script>
import Experience from "../components/LawyerProfileComponents/Experience.vue";
import Profile from "../components/LawyerProfileComponents/Profile.vue";
import Comment from "../components/LawyerProfileComponents/Comment.vue";
import axios from 'axios';

export default {
  name: "MonProfile",
  data() {
    return {
      section: 0,
      lawyer : {}
    };
  },
  components: {
    Experience,
    Profile,
    Comment,
  },
  methods : {
    async getLawyer(){
      let id = localStorage.getItem('id'); 
      console.log(id);
      let config = {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token")
        },
      };
      axios
        .get(
          `http://localhost/nassiha-law-consultation/lawyerscontroller/getLawyer/${id}`,
          config
        )
        .then((response) => {
          console.log(response.data);
          this.lawyer = response.data;
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
    
    this.getLawyer();


  },
  computed: {
  }
};
</script>

<style lang="scss">
.container {
  margin: 20px 15%;
}
.header {
  .profile-header {
    @include d-flex(row, flex-start);
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
    ul {
      list-style: none;
      display: grid;
      padding: 10px;
      grid-template: 1fr / repeat(3, 1fr) 2fr;
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
