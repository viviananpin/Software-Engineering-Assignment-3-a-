#!C:\xampp\htdocs\myweb\大專生\flask\Scripts\python.exe
# 連線DB
from dbConfig import conn, cur
def getList():
    #查詢
    sql="select id, item,price, quantity from product_list where number>0 order by number desc;"
    cur.execute(sql)
    records = cur.fetchall()
    return records

def delgoods(id):
    sql="delete from product_list where id=%s;"
    cur.execute(sql,(id,))
    conn.commit()
    return True

def addgoods(name,price,number):
    sql="insert into product_list (item,goods_price,number) values (%s,%s,%s);"
    cur.execute(sql,(name,price,number))
    conn.commit()
    return True

def getId(id):
    sql="select id, item,goods_price, number from product_list where id = %s"
    cur.execute(sql,(id,))
    records = cur.fetchall()
    return records

def revise(id,name,price,number):
    sql = "update product_list set item=%s,goods_price=%s,number=%s where id=%s;"
    cur.execute(sql,(name,price,number,id))
    conn.commit()
    return True


def reduce(records):
    for record in records:
        sql = "update product_list set number=number-%s where id = %s;"
        cur.execute(sql,(record[1],record[0]))
        conn.commit()

# 結帳後庫存減少