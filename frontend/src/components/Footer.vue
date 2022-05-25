<template>
  <footer>
    <div class="upper-footer">
      <div>
        <img src="../assets/logos/LOGO_Component_light.png" alt="Footer logo" />
      </div>
      <div class="footer-nav">
        <div>
          <h4>Company</h4>
          <ul>
            <li><router-link to="/">About</router-link></li>
            <li><router-link to="/">Contact</router-link></li>
            <li><router-link to="/">Partners</router-link></li>
          </ul>
        </div>
        <div>
          <h4>Support</h4>
          <ul>
            <li><router-link to="/">Help Center</router-link></li>
            <li><router-link to="/">Terms of service</router-link></li>
            <li><router-link to="/">Privacy and Policy</router-link></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="lower-footer">
      <p>&copy; 2021 AFRdvs. All rights reserved</p>
      <div class="social-icons">
        <span
          ><a
            href="https://www.instagram.com/"
            target="_blank"
            rel="noopener noreferrer"
            ><img src="../assets/icons/social/Social_Icons.png" alt="" /></a
        ></span>
        <span
          ><a
            href="http://dribbble.com"
            target="_blank"
            rel="noopener noreferrer"
            ><img src="../assets/icons/social/Social_Icons-1.png" alt="" /></a
        ></span>
        <span
          ><a
            href="https://twitter.com/"
            target="_blank"
            rel="noopener noreferrer"
            ><img src="../assets/icons/social/Social_Icons-2.png" alt="" /></a
        ></span>
        <span
          ><a
            href="http://youtube.com"
            target="_blank"
            rel="noopener noreferrer"
            ><img src="../assets/icons/social/Social_Icons-3.png" alt="" /></a
        ></span>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style lang="scss" scoped>
footer {
  font-family: $poppins;
  font-weight: 200;
  color: white;
  .upper-footer {
    padding: 20px 0px;
    display: flex;
    justify-content: space-around;
    background-color: $secondary-color;
    div {
      img {
        width: 200px;
      }
    }
    .footer-nav {
      display: flex;
      gap: 20px;
      div {
        h4 {
          padding-bottom: 15px;
          font-weight: 500;
        }
        ul {
          list-style: none;
          li {
            a {
              color: inherit;
              text-decoration: none;
              font-size: 0.8rem;
            }
          }
        }
      }
    }
    @include phone {
      @include d-flex(column);
      div {
        img {
          width: 150px;
        }
      }
      gap: 20px;
      .footer-nav {
        gap: 10px;
        div {
          width: 100px;
          h4 {
            padding-bottom: 15px;
            font-weight: 500;
            text-align: center;
            font-size: 0.8rem;
          }
          ul {
            li {
              text-align: center;
              a {
                font-size: 0.7rem;
              }
            }
          }
        }
      }
    }
  }
  .lower-footer {
    padding: 10px 10%;
    background-color: $tertiary-color;
    display: flex;
    justify-content: space-between;
    align-items: center;
    p {
      font-size: 0.9rem;
      font-weight: 200;
    }
    .social-icons {
      display: flex;
      gap: 10px;
    }
    @include phone {
      @include d-flex(column);
      gap: 10px;
    }
  }
}
</style>