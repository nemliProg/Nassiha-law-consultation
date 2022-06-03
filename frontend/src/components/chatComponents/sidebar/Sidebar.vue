<template>
  <div class="sidebar" :style="{ width: sidebarWidth }">
    <div class="monProfile">
      <router-link to="/myprofile">
        <span v-if="collapsed" class="monProfile-collapsed">
          <div class="img-holder">
            <img :src="me.photo" alt="profile photo" />
          </div>
        </span>
        <span v-else class="monProfile-incollapsed">
          <div class="img-holder">
            <img :src="me.photo" alt="profile photo" />
          </div>
          <h3>My profile</h3>
        </span>
      </router-link>
    </div>
    <Interlocutor :collapsed="collapsed"/>
    <Interlocutor :collapsed="collapsed"/>
    <Interlocutor :collapsed="collapsed"/>
    <span
      class="collapse-icon"
      @click="toggleSidebar"
      :class="{ 'rotate-180': collapsed }"
    >
      <i style="color: white" class="fas fa-angle-double-left"></i>
    </span>
  </div>
</template>

<script>
import { collapsed, toggleSidebar, sidebarWidth } from "./state";
import { onMounted, onUnmounted } from "vue";
import Interlocutor from "./sidebarComponents/Interlocutor.vue";

export default {
  name: "Sidebar",
  props: {
    me: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
    }
  },
  components: {
    Interlocutor,
  },
  methods: {
  },
  setup() {
    return {
      collapsed,
      toggleSidebar,
      sidebarWidth,
    }
  },
};
</script>

<style lang="scss" scoped>
.sidebar {
  background-color: $primary-color;
  float: left;
  position: fixed;
  z-index: 1;
  top: 69px;
  left: 0;
  bottom: 0;
  padding: 0.5em;
  transition: 0.3s ease;
  @include d-flex(column, none, none);
  @include tablet {
    top: 58.23px;
  }
  a {
    color: white;
    text-decoration: none;
    
    .monProfile-collapsed {
      margin-bottom: 5px;
      @include d-flex(row, center, center);
      padding: 3px;
      border-radius: 5px;
      background: $secondary-color;
      .img-holder {
        background-color: #ffffff;
        width: 35px;
        height: 35px;
        overflow: hidden;
        border-radius: 50%;
        img {
          width: 100%;
        }
      }
    }
    .monProfile-incollapsed {
      margin-bottom: 5px;
      @include d-flex(row, flex-start, center);
      border-radius: 5px;
      background: $secondary-color;
      gap: 10px;
      .img-holder {
        background-color: #ffffff;
        width: 40px;
        height: 40px;
        overflow: hidden;
        border-radius: 50%;
        margin: 10px;
        img {
          width: 100%;
        }
      }
      h3 {
        color: white;
      }
    }
  }
  .collapse-icon {
    position: absolute;
    bottom: 0;
    padding: 0.75em 0.5em;
    color: rgba($color: #ffffff, $alpha: 0.7);
    transition: 0.2s linear;
    @include tablet {
      display: none;
    }
  }
  .rotate-180 {
    transform: rotate(180deg);
    transition: 0.2s linear;
  }
}
</style>