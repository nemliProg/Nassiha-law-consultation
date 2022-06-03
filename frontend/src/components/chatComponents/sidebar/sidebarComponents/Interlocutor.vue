<template>
  <div class="interlocutor">
    <span v-if="collapsed" class="interlocutor-collapsed">
      <div class="img-holder">
        <img src="https://www.simonebertollini.com/wp-content/uploads/2017/10/simone_2.jpg" alt="profile photo" />
      </div>
    </span>
    <span v-else class="interlocutor-incollapsed">
      <div class="img-holder">
        <img src="https://www.simonebertollini.com/wp-content/uploads/2017/10/simone_2.jpg" alt="profile photo" />
      </div>
      <h3>Maître Rachid Tarafi</h3>
    </span>
  </div>
</template>

<script>
export default {
  name: "Interlocutor",
  props: ["interlocutor", "collapsed"],
  components: {},
  mounted() {},
  computed: {},
};
</script>

<style lang="scss" scoped>
.interlocutor{
  margin-top: 5px;
  cursor: pointer;
}
.interlocutor-collapsed {
  @include d-flex(row, center, center);
  padding: 3px;
  border-radius: 5px;
  background: $bg-color;
  .img-holder {
    background-color: $tertiary-color;
    width: 35px;
    height: 35px;
    overflow: hidden;
    border-radius: 50%;
    img {
      width: 100%;
    }
  }
}
.interlocutor-incollapsed {
  @include d-flex(row, flex-start, center);
  border-radius: 5px;
  background: $bg-color;
  gap: 10px;
  .img-holder {
    background-color: #ffffff;
    width: 40px;
    height: 40px;
    overflow: hidden;
    border-radius: 50%;
    margin: 10px;
    img {
      width: 100%;
    }
  }
  h3 {
    color: $secondary-color;
    font-size: 0.8rem;
  }
}
</style>