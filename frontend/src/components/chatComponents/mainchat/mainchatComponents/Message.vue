<template>
  <div :class="{ 'right message' : (direction === 'right'), 'left message' : (direction === 'left')}">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam inventore cupiditate voluptas.
    <span class="datetime">12-06-2022 14:49</span>
    <div :class="{ 'triangle triangle-right': (direction === 'right'), 'triangle triangle-left' : (direction === 'left')}"></div>
  </div>
</template>

<script>
export default {
  name: "Message",
  props : ['direction', 'message'],
};
</script>

<style lang="scss" scoped>
.message {
  background-color: $secondary-color;
  color: white;
  padding: 10px;
  border-radius: 10px;
  margin-top: 10px;
  width: auto;
  padding-bottom: 25px;
  position: relative;
  .datetime {
    font-size: 0.8rem;
    display: block;
    position: absolute;
    bottom: 0;
    right: 12px;
  }
  .triangle {
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-top: 15px solid $secondary-color;
    position: absolute;
    top: 0;
    left: -10px;
    &.triangle-right {
      left: auto;
      right: -10px;
    }
    &.triangle-left {
      left: -10px;
      right: auto;
    }
  }
}
</style>