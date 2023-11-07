#!C:\xampp\htdocs\myweb\大專生\flask\Scripts\python.exe
# 連線DB
from dbConfig import conn, cur
def getList():
    #查詢
    sql="select id, item,price, quantity from product_list where quantity>0 order by quantity desc;"
    cur.execute(sql)
    records = cur.fetchall()
    return records

def delgoods(id):
    sql="delete from product_list where id=%s;"
    cur.execute(sql,(id,))
    conn.commit()
    return True

def addgoods(item,price,quantity):
    sql="insert into product_list (item,price,quantity) values (%s,%s,%s);"
    cur.execute(sql,(item,price,quantity))
    conn.commit()
    return True

def getId(id):
    sql="select id, item,price, quantity from product_list where id = %s"
    cur.execute(sql,(id,))
    records = cur.fetchall()
    return records

def revise(id,item,price,quantity):
    sql = "update product_list set item=%s,price=%s,quantity=%s where id=%s;"
    cur.execute(sql,(item,price,quantity,id))
    conn.commit()
    return True


def reduce(records):
    for record in records:
        sql = "update product_list set quantity=quantity-%s where id = %s;"
        cur.execute(sql,(record[1],record[0]))
        conn.commit()