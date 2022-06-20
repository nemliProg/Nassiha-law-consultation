<template>
  <nav>
    <div class="mobile-work">
      <div class="logo-holder">
        <router-link to="/"
          ><img src="../assets/logos/LOGO_Component.png" alt="logo nassiha"
        /></router-link>
      </div>
      <img
        @click="toggleNav"
        id="bm"
        src="../assets/icons/burgerMenu.svg"
        alt="burger menu"
      />
    </div>
    <ul id="links">
      <li @click="toggleNav" v-if="!isLoggedIn || role !== 'lawyer'"><router-link to="/">HOME</router-link></li>
      <li @click="toggleNav" v-if="!isLoggedIn"><router-link to="/about">About</router-link></li>
      <li @click="toggleNav" v-if="isLoggedIn && role === 'client'">
        <router-link to="/search">Research Lawyer</router-link>
      </li>
      <li @click="toggleNav" v-if="!isLoggedIn">
        <router-link to="/authenticate">Login / Register</router-link>
      </li>
      <li @click="toggleNav" v-if="isLoggedIn">
        <router-link to="/chat">Conversations</router-link>
      </li>
      <li @click="toggleNav" v-if="isLoggedIn && role === 'lawyer'">
        <router-link to="/myprofile">My Profile</router-link>
      </li>
      <li @click="toggleNav" v-if="isLoggedIn">
        <router-link @click="logout" to="/">Logout</router-link>
      </li>
    </ul>
  </nav>
  <div class="layer" @click="toggleNav" ref="layer"></div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "Nav",
  methods: {
    logout() {
      localStorage.clear();
      this.$store.dispatch("setIsLoggedIn", false);
      this.$store.dispatch("setRole", "guest");
    },
    toggleNav() {
      const nav = document.getElementById("links");
      const navLinks = document.querySelectorAll("nav ul li");
      nav.classList.toggle("opened-nav");
      this.$refs.layer.classList.toggle("active");
      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = ``;
        } else {
          link.style.animation = `navLinksFade 0.5s ease forwards ${
            index / 6 + 0.5
          }s`;
        }
      });
    },
  },
  computed: {
    ...mapState({
      isLoggedIn: (state) => state.isLoggedIn,
      role: (state) => state.role,
    }),
  },
};
</script>

<style lang="scss" >
.layer {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3);
  z-index: 2;
  &.active {
    display: none;
  }
  @include tablet {
    &.active {
      display: block;
    }
  }
}
nav {
  @include d-flex(row, space-between);
  padding: 15px 10%;
  font-size: 0.8rem;
  font-weight: 400;
  font-family: $poppins;
  background-color: white;
  position: relative;
  z-index: 999;
  .mobile-work {
    @include d-flex(row, space-between);
  }
  .logo-holder {
    min-width: 150px;
    max-width: 150px;
    a {
      img {
        width: 100%;
        position: relative;
        z-index: 999;
      }
    }
  }
  ul {
    @include d-flex;
    gap: 30px;
    list-style: none;
    li {
      a {
        text-decoration: none;
        color: black;
      }
    }
    li:last-child {
      background-color: $secondary-color;
      padding: 10px 15px;
      a {
        color: white;
      }
    }
  }
  #bm {
    display: none;
    max-width: 30px;
    min-width: 30px;
    cursor: pointer;
    position: relative;
    z-index: 998;
  }
}
@include tablet {
  nav {
    flex-direction: column;
    .mobile-work {
      width: 100%;
    }
    .logo-holder {
      min-width: 120px;
      max-width: 120px;
      a {
        img {
          width: 100%;
        }
      }
    }
    ul {
      position: absolute;
      transform: translateY(-130%);
      transition: transform 0.5s ease-in-out;
      display: none;
      @include d-flex(column);
      padding: 20px 0px;
      gap: 15px;
      top: 58px;
      background: white;
      width: 100vw;
      li {
        opacity: 0;
        a {
          color: $secondary-color;
        }
      }
      li:last-child {
        padding: 5px 10px;
        a {
          color: white;
        }
      }
    }
  }
  #bm {
    display: block !important;
  }
  .opened-nav {
    @include d-flex(column);
    transform: translateY(0%);
  }
}
@keyframes navLinksFade {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0px);
  }
}
</style>
