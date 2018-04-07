from urllib import request
import json
import sys

def getportId_name(i,date):
    req = request.Request(
        "http://ocean.cnss.com.cn/index.php?m=resource&c=tide&a=get_tide_data&portid="+str(i)+"&date="+date)

    req.add_header("X-Requested-With", "XMLHttpRequest")
    req.add_header("Referer", "http://ocean.cnss.com.cn/")

    response = request.urlopen(req)

    strjson = json.loads(response.read())
    print(strjson)

    return strjson

getportId_name(sys.argv[1],sys.argv[2])
