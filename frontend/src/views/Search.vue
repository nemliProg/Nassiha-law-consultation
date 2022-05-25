<template>
  <div class="search-section">
    <div class="inputs">
      <input class="input" placeholder="Lawyer's name" type="text" v-model="lawyerName" />
      <div class="serch-select">
        <input class="input" list="skills" placeholder="All Skills" name="skill" v-model="skill" />
        <datalist id="skills">
          <option v-for="(skill, i) in skills" :value="skill" :key="i">
            {{ skill }}
          </option>
        </datalist>
      </div>
      <div class="serch-select">
        <input class="input" list="cities" placeholder="All Cities" name="city" v-model="city" />
        <datalist id="cities">
          <option v-for="(city, i) in cities" :value="city" :key="i">
            {{ city }}
          </option>
        </datalist>
      </div>
    </div>
    <button class="search-icon">
      <img src="../assets/icons/SearchIcon.svg" alt="search icon" />
    </button>
  </div>
  <div class="lawyers">
    <Lawyer v-for="(lawyer,i) in lawyers" :key="i" :lawyer="lawyer" @click="navigate(lawyer.id)" />
  </div>
</template>

<script>
import axios from 'axios'
import Lawyer from '../components/searchComponents/item.vue'
export default {
  name: "Search",
  components: {
    Lawyer
  },
  data() {
    return {
      lawyerName: "",
      city: "",
      skill: ""
    }
  },
  methods: {
    navigate(id) {
      this.$router.push({path : `/profile/${id}`})
    }
  },
  computed: {
    lawyers() {
      return this.$store.state.lawyers;
    },
    cities() {
      return this.$store.state.cities;
    },
    skills() {
      return this.$store.state.skills;
    },
  },
  mounted() {
    
  }
};
</script>

<style lang="scss">
.search-section {
  width: max-content;
  margin: 20px auto;
  border-radius: 15px;
  padding: 15px;
  @include d-flex;
  gap: 10px;
  background-color: $secondary-color;
  .inputs {
    @include d-flex;
    gap: 10px;
    .input {
      padding: 5px 8px;
      border-radius: 15px;
      border: none;
      outline: none;
    }
  }
  .serch-select {
    display: inline-block;
  }
  .search-icon {
    width: 40px;
    height: 40px;
    padding: 5px;
    border: none;
    border-radius: 50%;
    img{
      width: 100%;
    }
  }
}
.lawyers {
  width: 80%;
  margin: 10px auto 20px;
  @include d-flex(column);
  gap: 15px;
  .lawyer {
    cursor: pointer;
    @include d-flex(row,space-between);
    background-color: $tertiary-color;
    width: 100%;
    border-radius: 20px;
    padding: 20px 60px 20px 20px;
    *{
      color: white;
      font-family: $source;
    }
    h4 {
      font-size: 15px;
      font-weight: 400;
    }
    div:first-child {
      .lawyer-photo {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 10px;
        img {
          width: 100%;
        }
      }
      .langs {
        @include d-flex;
        gap: 5px;
        img{
          width: 20px;
        }
      }
    }
    &>div:nth-child(2n) {
      flex: 1;
      padding: 0px 20px 0px 50px;
      align-items: flex-start;
      justify-content: flex-start;
      height: 100%;
      *{
        line-height: 24px;
      }
      .lawyer-adress {
        font-size: 12px;
        span {
          margin-bottom: -5px;
        }
        @include d-flex(row,flex-start);
        gap: 6px;
      }
      .skills {
        margin-top: 6px;
        p {
          font-size: 12px;
          line-height: 18px;
          font-weight: 400;
        }
      }
      .see-more {
        margin-top: 5px;
        @include d-flex(row,flex-start);
        gap: 5px;
        font-size: 12px;
        background-color: white;
        width: max-content;
        color: $tertiary-color;
        padding: 0px 12px;
        border-radius: 20px;
        span{
          width: 20px;
          @include d-flex;
          img {
            width: 100%;
          }
        }
      }
    }
  }
}
</style>