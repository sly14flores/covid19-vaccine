const {
	devMode = true,
	authHost = 'https://vaccines.launion.gov.ph',
	authEndpoint = '/api/broadcasting/auth',
	protocol = 'https',
	port = 7001,
	database = 'redis',
	redisHost = '10.10.2.49',
	redisPort = 6380,
	redisPassword = null,
} = process.env;

require('laravel-echo-server').run({
    authHost,
    authEndpoint,
	protocol,
	host: null,
	port,
    devMode,
    database,
    databaseConfig: {
        redis: {
            host: redisHost,
            port: redisPort,
			password: redisPassword
        }
    },
	secureOptions: 67108864,
	sslCertPath: "/home/misd/cert/052021/CEPO210513152748.cer",
	sslKeyPath: "/home/misd/cert/052021/launion.key",
	sslCertChainPath: "/home/misd/cert/052021/launion.csr",
	apiOriginAllow: {
		allowCors: true,
		allowOrigin: "*",
		allowMethods: "GET, POST",
		allowHeaders: "Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id"
	}
});
