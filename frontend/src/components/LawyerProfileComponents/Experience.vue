<template>
  <div class="container">
    <div class="experience">
      <div class="diplomes">
        <h3><img src="../../assets/icons/education.png" alt="" />Diplomes</h3>
        <div class="inside">
          <p>License - Private Law</p>
          <p>University Mollay Ismail Meknes</p>
        </div>
      </div>
      <div class="experiences">
        <h3><img src="../../assets/icons/mallette.png" alt="" />Experiences</h3>
        <div class="inside">
          <p>Lawyer</p>
          <p>Bar of Lawyers of Meknes</p>
          <p class="scnd-color">31 March 2014 - Today</p>
        </div>
      </div>
      <div class="languages">
        <h3><img src="../../assets/icons/traduire.png" alt="" />Languages</h3>
        <div class="inside">
          <p>
            <img src="../../assets/icons/languages/maroc.png" alt="arab" />Arab
          </p>
          <p>
            <img
              src="../../assets/icons/languages/la-france.png"
              alt="Frensh"
            />Frensh
          </p>
          <p>
            <img
              src="../../assets/icons/languages/royaume-uni.png"
              alt="english"
            />English
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Profile",
  props:["lawyer","v"]
};
</script>

<style lang="scss" scoped>
.experience {
  width: 80%;
  margin: auto;
  & > div > h3 {
    @include d-flex(row, flex-start);
    gap: 6px;
    & > img {
      width: 30px;
    }
  }
  & > div:first-child > h3 > img {
    width: 40px;
    margin-left: -5px;
  }
  & > div > .inside {
    padding: 5px 10px 15px;
  }
  .diplomes {
    p{
      margin-top: 10px;
    }
  }
  .experiences {
    p {
      margin-top: 10px;
      &.scnd-color {
        color: $tertiary-color;
      }
    }
  }
  .languages {
    p {
      margin-top: 10px;
      @include d-flex(row, flex-start);
      gap: 10px;
      img {
        width: 2.5rem;
      }
    }
  }
}
</style>