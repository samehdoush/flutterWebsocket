// Styles
// import '@mdi/font/css/materialdesignicons.min.css'
// import 'vuetify/styles'
import "../../scss/style.scss";
;
import { ar, en } from 'vuetify/locale'
// Vuetify
import { createVuetify } from 'vuetify'

const light = {
  dark: false,
  colors: {
    primary: "#ee8a6a",
    info: "#137100",
    success: "#05b187",
    accent: "#fc4b6c",
    warning: "#fec90f",
    error: "#fc4b6c",
    secondary: "#ee8a6a",
  },
}
const dark = {
  dark: true,
  colors: {
    primary: "#bc2017",
    info: "#137100",
    success: "#05b187",
    accent: "#fc4b6c",
    warning: "#fec90f",
    error: "#fc4b6c",
    secondary: "#ee8a6a",
  }
}

export default createVuetify(
  {
    ssr: !!import.meta.env.SSR,
    locale: {
      defaultLocale: 'en',
      fallbackLocale: 'ar',
      messages: { ar, en }
    },
    theme: {
      cspNonce: 'dQw4w9WgXcQ',
      defaultTheme: 'dark',
      themes: {
        light,
        dark

      },
      dark :true
    },

    icons: {
      defaultSet: 'mdi', // This is already the default value - only for display purposes
    },
    defaults: {
      VBtn: {
        color: "primary",
        rounded: "md",

        flat: true,
        fontWeight: "400",
        letterSpacing: "0",
      },
      VCard: {
        flat: true,
        elevation: 10,
      },
    },
  }
);
