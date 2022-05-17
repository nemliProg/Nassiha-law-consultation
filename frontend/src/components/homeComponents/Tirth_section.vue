<template>
  <div class="tirth">
    <h2>Some count that matters</h2>
    <p>Our achievement in the journey depicted in numbers</p>
    <div>
      <div><span class="number">30</span><span class="text">clients</span></div>
      <div class="lines">
        <span class="number">300+</span
        ><span class="text">Taken business legalities</span>
      </div>
      <div>
        <span class="number">8</span><span class="text">Years of journey</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "tirth-section",
};
</script>

<style lang="scss" scoped>
.tirth {
  background-color: $secondary-color;
  padding: 3rem;
  text-align: center;
  color: white;
  h2 {
    font-family: $source;
    font-weight: 900;
    letter-spacing: 1.5px;
    font-size: 2rem;
  }
  & > p {
    margin-bottom: 2rem;
    margin-top: 1rem;
    font-weight: 200;
  }
  & > div {
    display: grid;
    grid-template: 1fr / repeat(3, auto);
    justify-content: center;
    align-items: center;
    & > div {
      display: flex;
      flex-direction: column;
      width: 200px;
      .number {
        font-weight: 700;
        font-size: 2rem;
      }
      .text {
        font-weight: 200;
      }
    }
    .lines {
      position: relative;
      &::before,
      &::after {
        content: "";
        display: block;
        width: 2px;
        height: 100%;
        background-color: white;
        position: absolute;
        filter: opacity(0.4);
      }
      &::before {
        left: 0;
        margin-left: -10px;
      }
      &::after {
        content: "";
        right: 0px;
        margin-right: -10px;
      }
    }
  }
  @include tablet {
    h2 {
      font-size: 1.5rem;
    }
    p {
      font-size: 0.8rem;
    }
    & > div {
      & > div {
        display: flex;
        flex-direction: column;
        width: 150px;
        .number {
          font-weight: 700;
          font-size: 1.5rem;
        }
        .text {
          font-size: 0.8rem;
        }
      }
    }
  }
}
</style>