

from urllib import request
from urllib.parse import quote
import json
import sys


def getportId_name(address):

    myurl = "http://apis.map.qq.com/jsapi?qt=poi&wd="+quote(address)+"&pn=0&rn=10&rich_source=qipao&rich=web&nj=0&c=1&key=FBOBZ-VODWU-C7SVF-B2BDI-UK3JE-YBFUS&output=json&pf=jsapi&ref=jsapi&cb=qq.maps._svcb2.search_service_0%E3%80%81"

    req = request.Request(myurl)


    req.add_header("Cookie", "pgv_pvi=2576330752; pgv_si=s1700423680; pgv_pvid=3029944584; pgv_info=ssid=s5842730&pgvReferrer=; pt2gguin=o1494230056; uin=o1494230056; RK=2pAYEfFAeq; ptcz=4bf4d3b3ca9130159052ef98702f0023f997c6334012803d3d01f05a682a5817; eas_sid=l1O5d241x64305w2r5G2h9E071; mpuv=dcdcd08f-b130-4355-6f20-7e1a4a3e47a5; ptisp=cm; tvfe_boss_uuid=93130e9c72f2812c; o_cookie=1494230056; skey=@MqsBsOgK8")
    req.add_header("Host","apis.map.qq.com")
    req.add_header("Proxy-Connection", "keep-alive")
    req.add_header("Upgrade-Insecure-Requests", "1")

    req.add_header("Referer", "http://www.gpsspg.com/iframe/maps/qq_161128.htm?mapi=2")
    req.add_header("User-Agent", "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36")

    response = request.urlopen(req)

    strjson = json.loads(response.read().decode("gbk").encode("utf-8"))

    # strjson = response.read().decode("gb18030").encode("utf-8")
    if float(strjson['detail']['city']['pointy'])>180.00 :
        print(float(strjson['detail']['pois'][0]['pointy']))
    else :
        print(float(strjson['detail']['city']['pointy']))

    return strjson



getportId_name(sys.argv[1])