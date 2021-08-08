<template>
  <div>
    <router-view />
  </div>
</template>

<script>

import Echo from 'laravel-echo';
window.io = require('socket.io-client');

export default {
  name: 'App',
  setup() {

    const pgluVaccinesStr = localStorage.getItem('pgluVaccines') || '{"profile": {}}'

    const pgluVaccines = JSON.parse(pgluVaccinesStr)

    const { profile } = pgluVaccines || {}
    const accessToken = profile.token || ''

    window.Echo = new Echo({
      broadcaster: 'socket.io',
      host: `${process.env.MIX_ECHO_SERVER}:${process.env.MIX_ECHO_SERVER_PORT}`,
      // auth: {
      //   headers: {
      //     Authorization: `Bearer ${accessToken}`,
      //   },
      // }
    });

  }
}

</script>