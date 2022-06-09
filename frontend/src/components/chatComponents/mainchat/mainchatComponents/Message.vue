<template>
  <div :class="{ 'right message' : (message._from == id), 'left message' : (message._from != id)}">
    {{message.content}}
    <span class="datetime">{{ message.create_at }}</span>
    <div :class="{ 'triangle triangle-right': (message._from == id), 'triangle triangle-left' : (message._from != id)}"></div>
  </div>
</template>

<script>
export default {
  name: "Message",
  props : ['message'],
  data() {
    return {
      id : window.localStorage.getItem('id'),  
    };
  },
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