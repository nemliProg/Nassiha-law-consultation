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
    <div class="lawyer">
      <div>
        <div class="lawyer-photo">
          <img src="../assets/images/search_page/75e5a67cd7345216889591036672f7.jpg" alt="profile photo">
        </div>
        <div class="langs">
          <img src="../assets/icons/languages/maroc.png" alt="arabic">
          <img src="../assets/icons/languages/la-france.png" alt="frensh">
          <img src="../assets/icons/languages/royaume-uni.png" alt="english">
        </div>
      </div>
      <div>
        <h3>Maître Nadia Tarafi</h3>
        <h4>Avocat au barreau de Rabat</h4>
        <p class="lawyer-adress"><span class="adress-icon"><img src="../assets/icons/adressIcon.svg" alt=""></span> N°61, Quartier Akouass, Appartement 2, Rabat, Maroc</p>
        <div class="skills">
          <p>Generalist lawyer</p>
          <p>Family, personal and consumer law</p>
        </div>
        <div class="see-more">
          <span class="plus-icon"><img src="../assets/icons/Plus.svg" alt=""></span>
          see more skills
        </div>
      </div>
      <div>
        <img src="../assets/icons/akbarIcon.svg" alt="arrow">
      </div>
    </div>
        <div class="lawyer">
      <div>
        <div class="lawyer-photo">
          <img src="../assets/images/search_page/jpg_jem-jp-delcade-w-9925-c306e.jpg" alt="profile photo">
        </div>
        <div class="langs">
          <img src="../assets/icons/languages/maroc.png" alt="arabic">
          <img src="../assets/icons/languages/la-france.png" alt="frensh">
          <img src="../assets/icons/languages/royaume-uni.png" alt="english">
        </div>
      </div>
      <div>
        <h3>Maître Nadia Tarafi</h3>
        <h4>Avocat au barreau de Rabat</h4>
        <p class="lawyer-adress"><span class="adress-icon"><img src="../assets/icons/adressIcon.svg" alt=""></span> N°61, Quartier Akouass, Appartement 2, Rabat, Maroc</p>
        <div class="skills">
          <p>Generalist lawyer</p>
          <p>Family, personal and consumer law</p>
        </div>
        <div class="see-more">
          <span class="plus-icon"><img src="../assets/icons/Plus.svg" alt=""></span>
          see more skills
        </div>
      </div>
      <div>
        <img src="../assets/icons/akbarIcon.svg" alt="arrow">
      </div>
      
    </div>
        <div class="lawyer">
      <div>
        <div class="lawyer-photo">
          <img src="../assets/images/search_page/0e97ea4b2354a0fa7382128fd033d8.jpg" alt="profile photo">
        </div>
        <div class="langs">
          <img src="../assets/icons/languages/maroc.png" alt="arabic">
          <img src="../assets/icons/languages/la-france.png" alt="frensh">
          <img src="../assets/icons/languages/royaume-uni.png" alt="english">
        </div>
      </div>
      <div>
        <h3>Maître Nadia Tarafi</h3>
        <h4>Avocat au barreau de Rabat</h4>
        <p class="lawyer-adress"><span class="adress-icon"><img src="../assets/icons/adressIcon.svg" alt=""></span> N°61, Quartier Akouass, Appartement 2, Rabat, Maroc</p>
        <div class="skills">
          <p>Generalist lawyer</p>
          <p>Family, personal and consumer law</p>
        </div>
        <div class="see-more">
          <span class="plus-icon"><img src="../assets/icons/Plus.svg" alt=""></span>
          see more skills
        </div>
      </div>
      <div>
        <img src="../assets/icons/akbarIcon.svg" alt="arrow">
      </div>
      
    </div>
        <div class="lawyer">
      <div>
        <div class="lawyer-photo">
          <img src="../assets/images/search_page/jpg_jem-jp-w-1651-69173.jpg" alt="profile photo">
        </div>
        <div class="langs">
          <img src="../assets/icons/languages/maroc.png" alt="arabic">
          <img src="../assets/icons/languages/la-france.png" alt="frensh">
          <img src="../assets/icons/languages/royaume-uni.png" alt="english">
        </div>
      </div>
      <div>
        <h3>Maître Nadia Tarafi</h3>
        <h4>Avocat au barreau de Rabat</h4>
        <p class="lawyer-adress"><span class="adress-icon"><img src="../assets/icons/adressIcon.svg" alt=""></span> N°61, Quartier Akouass, Appartement 2, Rabat, Maroc</p>
        <div class="skills">
          <p>Generalist lawyer</p>
          <p>Family, personal and consumer law</p>
        </div>
        <div class="see-more">
          <span class="plus-icon"><img src="../assets/icons/Plus.svg" alt=""></span>
          see more skills
        </div>
      </div>
      <div>
        <img src="../assets/icons/akbarIcon.svg" alt="arrow">
      </div>
      
    </div>
  
  </div>
  
</template>

<script>
export default {
  name: "Search",
  components: {},
  data() {
    return {
      lawyerName: "",
      city: "",
      skill: "",
    };
  },
  methods: {
  
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