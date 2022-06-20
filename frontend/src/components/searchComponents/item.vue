<template>
  <div class="lawyer">
    <div>
      <div class="lawyer-photo">
        <img :src="lawyer.photo" alt="profile photo" />
      </div>
      <div class="langs">
        <img v-for="lang in lawyer.languages" :src="city[lang.name]" />
      </div>
    </div>
    <div>
      <h3>Maître {{ lawyer.fname }} {{ lawyer.lname }}</h3>
      <h4>Avocat au barreau de {{ lawyer.bar }}</h4>
      <p class="lawyer-adress">
        <span class="adress-icon"
          ><img src="../../assets/icons/adressIconWhite.svg" alt=""
        /></span>
        {{ lawyer.adress }}
      </p>
      <div class="skills">
        <p v-for="(skill, i) in lawyer.skills?.slice(0, 2)">
          {{ skill.skill }}
        </p>
      </div>
      <div class="see-more">
        <span class="plus-icon"
          ><img src="../../assets/icons/Plus.svg" alt=""
        /></span>
        see more skills
      </div>
    </div>
    <div>
      <img src="../../assets/icons/akbarIcon.svg" alt="arrow" />
    </div>
  </div>
</template>

<script>
import fr from "../../assets/icons/languages/la-france.png";
import en from "../../assets/icons/languages/royaume-uni.png";
import de from "../../assets/icons/languages/germany.png";
import es from "../../assets/icons/languages/spain.png";
import it from "../../assets/icons/languages/italy.png";
import ar from "../../assets/icons/languages/maroc.png";
import dut from "../../assets/icons/languages/netherlands.png";

export default {
  name: "search item",
  props: ["lawyer"],
  data() {
    return {
      city: {
        Arabic: ar,
        French: fr,
        English: en,
        Italian: it,
        German: de,
        Dutch: dut,
        Spanish: es,
      },
    };
  },
};
</script>

<style lang="scss" scoped>
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
    @include tablet {
      font-size: 13px;
    };
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
    @include d-flex(column, flex-start, flex-start);
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
@include tablet {
  .lawyer {
    flex-direction: column !important;
    padding: 10px !important;
    div:first-child {
      .lawyer-photo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 10px;
        img {
          width: 100%;
        }
      }
    }
    div:nth-child(2n) {
      align-items: center !important;
      justify-content: center !important;
      padding: 0;
      text-align: center;
    }
    div:last-child {
      display: none;
    }
  }
}
</style>