<template>
  <div class="search-section">
    <div class="inputs" ref="search">
      <input
        class="input"
        @keyup="filter"
        placeholder="Lawyer's name"
        type="text"
        v-model="lawyerName"
      />
      <div class="serch-select">
        <input
          class="input"
          @change="filter"
          @keyup="filter"
          list="skills"
          placeholder="All Skills"
          name="skill"
          v-model="skill"
        />
        <datalist id="skills">
          <option v-for="(skill, i) in skills" :value="skill" :key="i">
            {{ skill }}
          </option>
        </datalist>
      </div>
      <div class="serch-select">
        <input
          class="input"
          @change="filter"
          @keyup="filter"
          list="cities"
          placeholder="All Cities"
          name="city"
          v-model="city"
        />
        <datalist id="cities">
          <option v-for="(city, i) in cities" :value="city" :key="i">
            {{ city }}
          </option>
        </datalist>
      </div>
    </div>
    <button @click="toggleSearch" class="search-icon">
      <img src="../assets/icons/SearchIcon.svg" alt="search icon" />
    </button>
  </div>
  <div class="lawyers">
    <Lawyer
      v-for="(lawyer, i) in lawyersFilter"
      :key="i"
      :lawyer="lawyer"
      @click="navigate(lawyer.id)"
    />
  </div>
</template>

<script>
import Lawyer from "../components/searchComponents/item.vue";

export default {
  name: "Search",
  components: {
    Lawyer,
  },
  data() {
    return {
      lawyerName: "",
      city: "",
      skill: "",
      lawyersFilter: [],
    };
  },
  methods: {
    navigate(id) {
      this.$router.push({ path: `/profile/${id}` });
    },
    toggleSearch() {
      this.$refs.search.classList.toggle("active");
    },
    filter() {
      this.lawyersFilter = this.lawyers.filter((lawyer) => {
        let name =
          lawyer.fname.toLowerCase() + " " + lawyer.lname.toLowerCase();
        return name.toLowerCase().includes(this.lawyerName.toLowerCase());
      });
      if (this.skill != "") {
        this.lawyersFilter = this.lawyersFilter.filter((lawyer) => {
          let ifTrue = false;
          lawyer.skills?.forEach((skill) => {
            if (skill.skill.toLowerCase().includes(this.skill.toLowerCase())) {
              ifTrue = true;
            }
          });
          return ifTrue ? lawyer : null;
        });
      }
      if (this.city != "") {
        this.lawyersFilter = this.lawyersFilter.filter((lawyer) => {
          return lawyer.bar.toLowerCase().includes(this.city.toLowerCase());
        });
      }
    },
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
    this.$store.dispatch("getLawyers");
    this.lawyersFilter = this.lawyers;
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
  background-color: $secondary-color;
  .inputs {
    transition: height 0.5s ease-in-out;
    @include d-flex;
    gap: 10px;
    margin-right: 10px;
    .input {
      padding: 5px 8px;
      border-radius: 15px;
      border: none;
      outline: none;
    }
  }
  @include tablet {
    .inputs {
      flex-direction: column;
      width: 0px;
      height: 0px;
      overflow: hidden;
    }
    .inputs.active {
      width: 184px;
      height: 110px;
      margin-right: 10px;
    }
  }
  .serch-select {
    display: inline-block;
  }
  .search-icon {
    cursor: pointer;
    width: 40px;
    height: 40px;
    padding: 5px;
    border: none;
    border-radius: 50%;
    img {
      width: 100%;
    }
  }
}
.lawyers {
  width: 80%;
  margin: 10px auto 20px;
  @include d-flex(column, flex-start);
  min-height: 500px;
  gap: 15px;
  .lawyer {
    cursor: pointer;
    @include d-flex(row, space-between);
    background-color: $tertiary-color;
    width: 100%;
    border-radius: 20px;
    padding: 20px 60px 20px 20px;
    * {
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
        img {
          width: 20px;
        }
      }
    }
    & > div:nth-child(2n) {
      flex: 1;
      padding: 0px 20px 0px 50px;
      align-items: flex-start;
      justify-content: flex-start;
      height: 100%;
      * {
        line-height: 24px;
      }
      .lawyer-adress {
        font-size: 12px;
        span {
          margin-bottom: -5px;
        }
        @include d-flex(row, flex-start);
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
        @include d-flex(row, flex-start);
        gap: 5px;
        font-size: 12px;
        background-color: white;
        width: max-content;
        color: $tertiary-color;
        padding: 0px 12px;
        border-radius: 20px;
        span {
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