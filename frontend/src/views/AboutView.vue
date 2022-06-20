<template>
  <div class="about">
    <h1>About US</h1>
    <div class="logo-holder">
      <img src="../assets/logos/LOGO_Component.svg" alt="Logo" />
    </div>
    <h2>PRESENTATION NASSIHA</h2>
    <p>
      NASSIHA is the first legal services platform in Morocco. With a clear and
      easy to use interface, the platform allows you to see the lawyers that
      match your needs, choose yours and contact him for a legal consultation
      with messages in real time according to your free slots 24/24 and 7/7.
    </p>
    <h2>OUR MISSION</h2>
    <p>
      Our mission is to provide the best legal services in Morocco. We are a
      team who are passionate about the legal services and the legal industry.
      We are here to help you to find the best lawyers in Morocco and to make
      your legal consultation easy and fast.
    </p>
    <h2>AREAS OF EXPERTISE</h2>
    <div class="expertises">
      <div class="expertise">
        <img src="../assets/icons/about/conversation.png" alt="expertise" />
        <p>Consultation</p>
      </div>
      <div class="expertise">
        <img src="../assets/icons/about/bar-graph.png" alt="expertise" />
        <p>Electronic Reputation</p>
      </div>
      <div class="expertise">
        <img src="../assets/icons/about/web-development.png" alt="expertise" />
        <p>Software Development</p>
      </div>
    </div>
    <h2>OUR TEAM</h2>
    <div class="team">
      <div class="team-member">
        <div class="img-member-holder">
          <!-- <img src="../assets/icons/about/ME.jpg" alt="Younes Nemli" /> -->
        </div>
        <p>Nemli Younes</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "AboutView",
};
</script>
<style lang="scss" scoped>
.about {
  & > h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin: 1rem 0 0 0;
    text-align: center;
    font-family: $tenor;
    @include tablet {
      font-size: 2rem;
    }
  }
  .logo-holder {
    width: 40%;
    padding: 30px;
    margin: 0 auto;
    & > img {
      width: 100%;
    }
    @include tablet {
      width: 80%;
    }
  }

  & > h2 {
    font-size: 1.5rem;
    font-weight: bold;
    margin: 1rem 0 1.3rem 0;
    text-align: center;
    font-family: $source;
    @include tablet {
      font-size: 1.2rem;
      margin: 1rem 0;
    }
  }
  & > p {
    font-size: 1.2rem;
    font-weight: 400;
    margin: 1rem 0 0 0;
    text-align: center;
    padding: 0 10%;
    @include tablet {
      font-size: 0.9rem;
    }
  }
  .expertises {
    @include d-flex(row);
    gap: 5%;
    margin: 0.5rem 0 2rem 0;
    padding: 0 10%;
    @include tablet {
      flex-wrap: wrap;
      margin: 0;
      padding: 0;
    }
    .expertise {
      @include d-flex(column);
      gap: 10px;
      @include tablet {
        width: 100%;
        margin: 0 auto;
      }
    }
  }
  .team {
    @include d-flex(row);
    gap: 5%;
    margin: 0.5rem 0 2rem 0;
    padding: 0 10%;

    @include tablet {
      flex-wrap: wrap;
      padding: 0;
    }
    .team-member {
      @include d-flex(column);
      gap: 10px;
      border-radius: 20px;
      // overflow: hidden;
      width: max(150px, 30%);
      .img-member-holder {
        background-image: url("../assets/icons/about/ME.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        
        width: 250px;
        height: 250px;
        border-radius: 20px;
      }

      p {
        font-size: 1.2rem;
        font-weight: bold;
        margin: 0;
        text-align: center;
        padding: 0;
        font-family: $tenor;
      }
      @include tablet {
        width: 60%;
        margin: 0 auto;
      }
      @include phone {
        width: 80%;
        margin: 0 auto;
      }
    }
  }
}
</style>