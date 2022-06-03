<template>
  <div class="second-section">
    <div>
      <h2>why do we help<br />with your legal problems?</h2>
      <p>
        We are here to guide you in your legal cases,
        which is sometimes complicated.
      </p>
    </div>
    <div class="cards">
      <Card v-for="card in cardsContent" :card="card" />
    </div>
    
  </div>
</template>

<script>
import Card from "../Card.vue";
import Circle_Layer from "../../assets/icons/Circle_Layer.svg";
import Bag from "../../assets/icons/Bag.svg";
import Rocket from "../../assets/icons/Rocket.svg";
import User_Arrows from "../../assets/icons/User_Arrows.svg";

export default {
  name: "Second-section",
  components: {
    Card,
  },
  data() {
    return {
      cardsContent: [
        {
          icon: Circle_Layer,
          title: "Enviromental Law",
          text: "Environmental legal issues might occur since the planned business activities are designed",
        },
        {
          icon: Bag,
          title: "Corporate and Commercial",
          text: "We provide a complete range of services for the continuity of your business activities.",
        },
        {
          icon: Rocket,
          title: "Information and Technology",
          text: "IT not followed by the existing regulation which might cause legal uncertainty and business uncertainty.",
        },
        {
          icon: User_Arrows,
          title: "Other Services",
          text: "In dealing with disruptive economic and legal challenge, our firm also provide various legal services.",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.second-section {
  background-color: $bg-color;
  display: grid;
  grid-template: 1fr / repeat(2, 1fr);
  padding: 5% 2%;
  h2 {
    font-family: $source;
    font-size: 2.5rem;
  }
  & > div {
    height: max-content;
  }
  & > div > p {
    font-size: 1.2rem;
    word-spacing: 7px;
    margin-top: 35px;
    color: #4f4f4f;
    font-weight: 300;
  }
  @include large-tablet {
    & > div > p {
      font-size: 1.1rem;
      margin-top: 20px;
    }
  }
  .cards {
    display: grid;
    grid-template: repeat(2, 1fr) / repeat(2, 1fr);
    width: calc(250 * 2px);
    gap: 10px;
  }
  @include large-tablet {
    grid-template: repeat(2, auto) / 1fr;
    gap: 30px;
    .cards {
      margin: auto;
      // grid-template: 1fr / repeat(4, 1fr);
      width: calc((220 + 10) * 2px);
    }

  }
  @include phone {
    .cards {
    grid-template: repeat(4, 1fr) / repeat(1, 1fr);
    width: 220px;
    gap: 10px;
    }
  }
}

</style>