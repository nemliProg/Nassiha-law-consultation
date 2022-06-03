import { createStore } from 'vuex'
import axios from 'axios';
import router from '@/router';
export default createStore({
  state: {
    skills: [
      "All Skills",
      "Generalist lawyer",
      "Family, personal and consumer law",
      "Real estate law, leases, construction, neighborhood",
      "Labor law and social security law",
      "Business law, contracts, and commercial companies",
      "NICT law, IT, advertising and intellectual property",
      "Insurance, bodily injury and health law",
      "Public law, urban planning and environmental law",
      "International law, foreigners law and immigration",
      "Criminal law, traffic law",
      "Tax law, taxes, duties",
      "Administrative law",
    ],
    cities: [
      "Casablanca",
      "El Kelaa des Srarhna",
      "Fès",
      "Tangier",
      "Marrakech",
      "Sale",
      "Rabat",
      "Meknès",
      "Kenitra",
      "Agadir",
      "Oujda-Angad",
      "Tétouan",
      "Taourirt",
      "Temara",
      "Safi",
      "Laâyoune",
      "Mohammedia",
      "Kouribga",
      "Béni Mellal",
      "El Jadida",
      "Ait Melloul",
      "Nador",
      "Taza",
      "Settat",
      "Barrechid",
      "Al Khmissat",
      "Inezgane",
      "Ksar El Kebir",
      "Larache",
      "Guelmim",
      "Khénifra",
      "Berkane",
      "Bouskoura",
      "Al Fqih Ben Çalah",
      "Oued Zem",
      "Sidi Slimane",
      "Errachidia",
      "Guercif",
      "Oulad Teïma",
      "Ad Dakhla",
      "Ben Guerir",
      "Wislane",
      "Tiflet",
      "Lqoliaa",
      "Taroudannt",
      "Sefrou",
      "Essaouira",
      "Fnidq",
      "Ait Ali",
      "Sidi Qacem",
      "Tiznit",
      "Moulay Abdallah",
      "Tan-Tan",
      "Warzat",
      "Youssoufia",
      "Martil",
      "Aïn Harrouda",
      "Skhirate",
      "Ouezzane",
      "Sidi Yahya Zaer",
      "Benslimane",
      "Al Hoceïma",
      "Beni Enzar",
      "M’diq",
      "Sidi Bennour",
      "Midalt",
      "Azrou",
      "Ain El Aouda",
      "Beni Yakhlef",
      "Semara",
      "Ad Darwa",
      "Al Aaroui",
      "Qasbat Tadla",
      "Boujad",
      "Jerada",
      "Chefchaouene",
      "Mrirt",
      "Sidi Mohamed Lahmar",
      "Tineghir",
      "El Aïoun",
      "Azemmour",
      "Temsia",
      "Zoumi",
      "Laouamra",
      "Zagora",
      "Ait Ourir",
      "Sidi Bibi",
      "Aziylal",
      "Sidi Yahia El Gharb",
      "Biougra",
      "Taounate",
      "Bouznika",
      "Aourir",
      "Zaïo",
      "Aguelmous",
      "El Hajeb",
      "Mnasra",
      "Mediouna",
      "Zeghanghane",
      "Imzouren",
      "Loudaya",
      "Tit Mellil",
      "Asilah",
      "Demnat",
      "Arfoud",
      "Sidi Smai’il",
      "Taza",
      "Aïn Taoujdat",
      "Chichaoua",
    ],
    lawyers : [],
    isLoggedIn: false,
    role : 'guest',
  },
  getters: {
    // getLawyerById: (state) => (id) => {
    //   return state.lawyers.find(lawyer => lawyer.id == id)
    // }, 
    // getAllLawyers: (state) => {
      //   return state.lawyers
      // }
    },
    mutations: {
    SET_LAWYERS(state,lawyers){
      state.lawyers.length = 0
      state.lawyers.push(...lawyers)
    },
    SET_IS_LOGGED_IN(state, isLoggedIn) {
      state.isLoggedIn = isLoggedIn;
    },
    SET_ROLE(state, role) {
      state.role = role;
    }
  },
  actions: {
    async getLawyers({ commit }){
      let config = {
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
      };
      axios
        .get(
          "http://localhost/nassiha-law-consultation/lawyerscontroller/getlawyers",
          config
        )
        .then((response) => {
          console.log(response.data);
          if (response.data.message === false) {
            router.push({path : '/authenticate/client/login'});
          }else{
            commit('SET_LAWYERS',response.data)
          }
        })
        .catch((err) => console.log(err));
    },
    setIsLoggedIn({ commit },isLoggedIn) {
      commit("SET_IS_LOGGED_IN",isLoggedIn );
    },
    setRole({ commit },role) {
      commit("SET_ROLE",role );
    },
  },
  modules: {
  }
})
