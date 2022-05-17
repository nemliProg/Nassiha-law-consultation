<template>
  <div class="card">
    <span>
      <img :src="card.icon" alt="icon" />
    </span>
    <h3>{{ card.title }}</h3>
    <p>
      {{ card.text }}
    </p>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    card: Object,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

<style lang="scss" scoped>
.card {
  width: 250px;
  height: 250px;
  padding: 15px 30px;
  background-color: white;
  border-radius: 10px;
  h3 {
    font-size: 1.5rem;
    font-family: $source;
    margin-bottom: 10px;
  }
  p {
    font-family: $tenor;
    color: #8b8c8c;
    line-height: 20px;
    word-spacing: 3px;
    font-size: 14px;
  }
  @include large-tablet {
    width: 220px;
    height: 220px;
    padding: 15px 15px;
    background-color: white;
    border-radius: 10px;
    h3 {
      font-size: 1.2rem;
    }
    p {
      font-family: $tenor;
      word-spacing: 2px;
      font-size: 12.5px;
    }
  }
  @include tablet {

    h3 {
      
    }
    p {
      
    }
  }
  @include phone {
    
    h3 {
      
    }
    p {
      
    }
  }
}
</style>