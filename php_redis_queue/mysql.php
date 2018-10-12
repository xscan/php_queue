<?php
 
/**
 
 * Created by PhpStorm.
 
 * User: Administrator
 
 * Date: 2016/6/27
 
 * Time: 18:55
 
 */
 
  
 
Class Mysqls{
 
  
 
  private $table; //表
 
  private $opt;
 
  
 
  public function __construct($host,$user,$pwd,$name,$table_names)
 
  {
 
    $this->db=new mysqli($host,$user,$pwd,$name); //数据库连接
 
  
 
    if(mysqli_connect_errno()){
 
      echo "数据库连接错误".mysqli_connect_errno();
 
      exit();
 
    }
 
    $this->db->query("set names utf8");
 
    $this->table=$table_names;
 
    $this->opt['field']="*";
 
    $this->opt['where']=$this->opt['Order']=$this->opt['Limit']=$this->opt['Group']='';
 
//    var_dump($this->opt['where']);
 
    //$this->M($table_names);
 
  
 
  }
 
  
 
  //数据库连接
 
//  protected function M($table_name){
 
//    $this->db=new mysqli(DBHOST,DBUSER,DBPWD,DBNAME);
 
//
 
//    if(mysqli_connect_errno()){
 
//      echo "数据库连接错误".mysqli_connect_errno();
 
//      exit();
 
//    }
 
//    $this->db->query("set names utf8");
 
//    $this->table=$table_name;
 
//  }
 
  
 
  //表中的字段
 
  
 
  public function tbField(){
 
    $desc=$this->db->query("DESC {$this->table}");
 
    $fieldArr=array();
 
    while(($row=$desc->fetch_assoc())!=false){
 
      $fieldArr[]=$row['Field'];
 
    }
 
    // var_dump($fieldArr);
 
    return $fieldArr;
 
  }
 
  
 
  //查询字段
 
  public function field($filed){
 
    //拆分字段
 
    $filedArr=is_string($filed)?explode(",",$filed):$filed;
 
    if(is_array($filedArr)){
 
      $filed='';
 
      foreach($filedArr as $v){
 
        $filed.="'".$v."'".",";
 
      }
 
    }
 
    //var_dump($filed);
 
    return rtrim($filed,",");
 
  
 
  }
 
  
 
  //判断字段是否存在
 
  public function isfield($fileds)
 
  {
 
    $filedArr=is_string($fileds)?explode(",",$fileds):$fileds;
 
    $tbFiled=$this->tbField();
 
    //var_dump( $tbFiled);
 
    foreach($filedArr as $v){
 
      if(!in_array($v,$tbFiled)){
 
         echo "字段输入发错";
 
      }
 
    }
 
  
 
  }
 
  //条件语句
 
  public function where($where){
 
     $this->opt['where']=is_string($where)?" WHERE {$where}":"不是字符串";
 
    return $this;
 
  
 
  
 
  
 
  }
 
  //Limit
 
  public function Limit($limit){
 
     $this->opt['Limit']=is_string($limit)?" Limit {$limit}":"不是字符串";
 
    return $this;
 
  
 
  
 
  }
 
  public function Order($order){
 
     $this->opt['Order']=is_string($order)?" Order By {$order}":"不是字符串";
 
    return $this;
 
  
 
  
 
  }
 
  public function Group($group){
 
    $this->opt['Group']=is_string($group)?" Group BY {$group}":"不是字符串";
 
    return $this;
 
  
 
  
 
  }
 
  
 
  // 查询字符串
 
  public function select(){
 
    $sql="select * from {$this->table} {$this->opt['where']} {$this->opt['Group']} {$this->opt['Limit']} {$this->opt['Order']}";
    echo $sql; 
    return $this->fetch($sql);
 
  }
 
  //结果集查询
 
  public function fetch($sql){
 
    $result=$this->db->query($sql);
 
    $sqlarr=array();
 
    while(($row=$result->fetch_assoc())!=false){
 
      $sqlarr[]=$row;
 
    }
 
    // var_dump($sqlarr);
 
    return $sqlarr;
 
  }
 
  //无结果集查询
 
  public function querys($sql){
 
    $sqls=$this->db->query($sql);
 
    return $this->db->affected_rows;
 
  }
 
  
 
  //删除语句
 
  public function delete($where=array()){
 
    if($where=="" && empety($this->opt['where'])) die(" 不能为空");
 
    if($where!=""){
 
      if(is_array($where)){
 
        $where=implode(",",$where);
 
      }
 
      $this->opt['where']=" WHERE id IN({$where})";
 
    }
 
    $sql="delete from {$this->table} {$this->opt['where']} {$this->opt['Limit']}";
 
    var_dump($sql);
 
    //return $this->query($sql);
 
  }
 
  //数组键名
 
  public function key($key){
 
    if(!is_array($key))die("非法数组");
 
    $keys="";
 
    foreach($key as $v){
 
      $keys.=$v.",";
 
  
 
    }
 
    return rtrim($keys,",");
 
  }
 
  //数组值
 
  public function value($value){
 
    if(!is_array($value))die("非法数组");
 
    $strvalue="";
 
    foreach($value as $v){
 
      $strvalue.="'".$v."'".",";
 
    }
 
    return rtrim($strvalue,",");
 
  }
 
  
 
  //添加语句
 
  public function add($filed){
 
    if(!is_array($filed)) die("非法数组");
 
    $fileds=$this->key(array_keys($filed)); //返回数组中的键名
 
    //var_dump($fileds);
 
    $values=$this->value(array_values($filed));
 
    $sql="insert into {$this->table}({$fileds})VALUES($values)";
 
    //var_dump($sql);
 
    return $this->querys($sql);
 
  }
 
  
 
  //查找单条记录
 
  public function find($field,$id){
 
    $sql="select {$this->opt['field']} from {$this->table} {$this->where($field.'='."'".$id."'")}";
 
    var_dump($sql);
 
    return $this->fetch($sql);
 
  
 
  }
 
  //更新语句
 
  public function save($arrs){
 
    if(!is_array($arrs))die("非法的数组");
 
    //if(empty($this->opt['where']))die("条件不能为空");
 
    $str="";
 
    while(list($k,$v)=each($arrs))
 
    {
 
      $str="{$k}="."'{$v}',";
 
    }
 
    $str=rtrim($str,",");
 
    $sql="Update {$this->table} set {$str}{$this->opt['where']}";
 
  
 
    return $this->querys($sql);
 
  
 
  
 
  }
 
  //获取总记录数
 
  public function counts(){
 
  
 
    $sql="select 'id' from {$this->table}{$this->opt['where']}";
 
    //var_dump($sql);
 
    return $this->querys($sql);
 
  }
 
  
 
  
 
}
 