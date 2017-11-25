<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016082000295159",

		//商户私钥
		'merchant_private_key' => "MIIEpQIBAAKCAQEAxcg3JaSN1jXWl8bzp7XhoYikmdmUXyAtP8z8iT5Yigq+5aYq7wNsUg9C6v7uyyvg8TB4JH1LDxOy/avqoXyMlJZMjxpOSi+0m9DJlplHccbK7b1Iy+BA7/PCihify6z2ERghOIJOynPGEgH3udwpPkm/qs+CslY6ZtJEnP4irmGQegMIm92MmImKe3CcbmwWYGdglDMBQlPszIf6IBqJjNwIctu+lI2Sty0HwECsXsAOKijp0kcmzH2ybA8q+tR8APEBS2RswOdyFf0W+Kw/30HUbKcgXF5PD3Cz0OUgR1cqV/bsyRVXhFJt9DDdG9OxjKed5REA3teYMDaStpiY3QIDAQABAoIBAQCH9gbS/bfzVbdbRw0gcUvWO5TLnmL8saXpggToY8+BtbldLUm+XOAN2SfrW6zURimwI92zV95NUwFsmM4GjRQm4NtoVHEVVo4VvwWVXXFbqYi+vaxZWqPJUAyf2iWfYhsVzTypGAsJ6WRz5J5jShGgHBqCVXxHFDe5jzpTofA9ZubW1QNsNK8BVkjRr62dMoSprz9hCCEgswsbGKLx/bh8ab5ZHCOJMY7HEKr0s666u6+HuGkEqXk3Wn+rSsPrnKhOLtc4ZJMKbbdvRHFl9x4nX15IrR/wWGrWcYBcXChf443aUg7IYGmWGrbEQBA8Qp8WCC4tgZvQ7M7JDXCRAfSBAoGBAOkYW+w/T6oBb/sK2P2wpwNYNvJKUi2Vnng9N9M1fDEXZ85TI0F5PV5xv6XurIc/9y9oD6Lnt1bG66TwyInKFQMsx7iiTj2ZajiwAg1GwICEFtr78fbmYOJGvIfgAP5dfzRscmF02DCdEg380a+hSuK5Jozg4anTsoIXS5kqXUA5AoGBANk3iUbzBYOMLrWC9Gevm9U1CNpjM5JqBSUzH+LZnP2NYBK9lYzT6hTmt6w0L6OpyIQvcx8oGTkj2Pk+B4PPiA72WdktfGaqM3UC/sjP2jj3Zn4zqP+P/X9tsZwq6oPmL0EBxS4aNy+Mg7GvGWsv1GjEmRFBvK+a7UPLnUEQHZXFAoGATBW3a5X+2u89LiSMT8KpwV26EbxQtrBv2a+h2T9MGnoZWC+rAmQgtANNG0yc5Ejs1nyRHgukvJ6RrHUsAE4GLdMgHhRclZ7OHVLWWJ8PluOG0lQK1xy74yBTycZEjMLYErSTYVxSdQvQKOCtUTbEytzEyJdfEaAYVH5mHsjFR4ECgYEAgezWD7oM8kJHLgrGZb6EV2MBiJ8NmeYQbc/GosnHPWHytULw0OtweFAITNhqJlrHtUksctZpP+RRQ8P2esEHgOuZkm3CmyXy4WqJO1QYEzrn81SzISnfVvkl42NIItzsJtYIOyszFx3VJ9K0QYi6ZHAznj7TvbXNdV+1D9Wz3IECgYEA2vRQuuemrkDOAlGiZkTWJLyutEg+MFutgyv1keJCzdpHSJlOT5tYb1qrvL7pFb7ghZVV/g7n3XN5cI2Y6oUMSVavyXoPPUQEcAPDAD3WWL7PQMEHFYEADE7Dhh5Ni4C2c//nqgF/ZvsbsBKB+H4lB2lhE/U+vGwWy7zUt+W8pfU=",
		//异步通知地址
		'notify_url' => "http://106.15.229.41/index.php/home/pay/alipay",
		
		//同步跳转
		'return_url' => "http://alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAu8W76Pwmifce//GHYAbRdaicB49spJRLwpB6XJmedX3ywwFhZZyGTM3c7Hoa3n+G3iywfHHriEBMR+4RjLBnjOL+2WI8qT72w/XBUZ1lGThonJleZUi805B2pI3+pk3kwMRGlwpqIjKCcZt7/8tGNpZ+dsZO51GhWBjQYIRSoNRN8sMXAUaqxRVtyWCZLTRdzBpYI01AJuxiZM2Xpb6MU47ZN/nbcITKU5A1P1PvOfssnTXK8jce93HQg18xZQ2Mhs2zdzxYLrVI6WnRZ1BZcVwQMFbwN8Yf+2n1AdQNTXliZ/elv5/4Hrh4ID/3rpXVD3dS4FdSv1t5fvm6BAQLIQIDAQAB
",
);