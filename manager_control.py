#!C:\xampp\htdocs\myweb\大專生\flask\Scripts\python.exe
import codecs,sys
import cgi
import goods
from dbConfig import conn, cur

print("Content-type:text/html; charset;utf-8\n")
sys.stdout.flush()

sql="select id, item, price, quantity from product_list order by id desc;"
cur.execute(sql)
goodsList = records = cur.fetchall()

msg = ""
for (id,item, price, number) in goodsList:
	msg = msg + f"<tr><td>編號 : {id}</td> <td>商品 : {item}</td> <td>商品價格 : {price}</td> <td>庫存 : {quantity}</td> </tr>" 

with open("manage.html","rb") as fp:
    st = fp.read()
    st = st.replace(b"###msg###",msg.encode())
    sys.stdout.buffer.write(st)
sys.stdout.flush()