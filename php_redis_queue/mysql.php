<?php
 
/**
 
 * Created by PhpStorm.
 
 * User: Administrator
 
 * Date: 2016/6/27
 
 * Time: 18:55
 
 */
 
  
 
Class Mysqls{
 
  
 
  private $table; //��
 
  private $opt;
 
  
 
  public function __construct($host,$user,$pwd,$name,$table_names)
 
  {
 
    $this->db=new mysqli($host,$user,$pwd,$name); //���ݿ�����
 
  
 
    if(mysqli_connect_errno()){
 
      echo "���ݿ����Ӵ���".mysqli_connect_errno();
 
      exit();
 
    }
 
    $this->db->query("set names utf8");
 
    $this->table=$table_names;
 
    $this->opt['field']="*";
 
    $this->opt['where']=$this->opt['Order']=$this->opt['Limit']=$this->opt['Group']='';
 
//    var_dump($this->opt['where']);
 
    //$this->M($table_names);
 
  
 
  }
 
  
 
  //���ݿ�����
 
//  protected function M($table_name){
 
//    $this->db=new mysqli(DBHOST,DBUSER,DBPWD,DBNAME);
 
//
 
//    if(mysqli_connect_errno()){
 
//      echo "���ݿ����Ӵ���".mysqli_connect_errno();
 
//      exit();
 
//    }
 
//    $this->db->query("set names utf8");
 
//    $this->table=$table_name;
 
//  }
 
  
 
  //���е��ֶ�
 
  
 
  public function tbField(){
 
    $desc=$this->db->query("DESC {$this->table}");
 
    $fieldArr=array();
 
    while(($row=$desc->fetch_assoc())!=false){
 
      $fieldArr[]=$row['Field'];
 
    }
 
    // var_dump($fieldArr);
 
    return $fieldArr;
 
  }
 
  
 
  //��ѯ�ֶ�
 
  public function field($filed){
 
    //����ֶ�
 
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
 
  
 
  //�ж��ֶ��Ƿ����
 
  public function isfield($fileds)
 
  {
 
    $filedArr=is_string($fileds)?explode(",",$fileds):$fileds;
 
    $tbFiled=$this->tbField();
 
    //var_dump( $tbFiled);
 
    foreach($filedArr as $v){
 
      if(!in_array($v,$tbFiled)){
 
         echo "�ֶ����뷢��";
 
      }
 
    }
 
  
 
  }
 
  //�������
 
  public function where($where){
 
     $this->opt['where']=is_string($where)?" WHERE {$where}":"�����ַ���";
 
    return $this;
 
  
 
  
 
  
 
  }
 
  //Limit
 
  public function Limit($limit){
 
     $this->opt['Limit']=is_string($limit)?" Limit {$limit}":"�����ַ���";
 
    return $this;
 
  
 
  
 
  }
 
  public function Order($order){
 
     $this->opt['Order']=is_string($order)?" Order By {$order}":"�����ַ���";
 
    return $this;
 
  
 
  
 
  }
 
  public function Group($group){
 
    $this->opt['Group']=is_string($group)?" Group BY {$group}":"�����ַ���";
 
    return $this;
 
  
 
  
 
  }
 
  
 
  // ��ѯ�ַ���
 
  public function select(){
 
    $sql="select * from {$this->table} {$this->opt['where']} {$this->opt['Group']} {$this->opt['Limit']} {$this->opt['Order']}";
    echo $sql; 
    return $this->fetch($sql);
 
  }
 
  //�������ѯ
 
  public function fetch($sql){
 
    $result=$this->db->query($sql);
 
    $sqlarr=array();
 
    while(($row=$result->fetch_assoc())!=false){
 
      $sqlarr[]=$row;
 
    }
 
    // var_dump($sqlarr);
 
    return $sqlarr;
 
  }
 
  //�޽������ѯ
 
  public function querys($sql){
 
    $sqls=$this->db->query($sql);
 
    return $this->db->affected_rows;
 
  }
 
  
 
  //ɾ�����
 
  public function delete($where=array()){
 
    if($where=="" && empety($this->opt['where'])) die(" ����Ϊ��");
 
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
 
  //�������
 
  public function key($key){
 
    if(!is_array($key))die("�Ƿ�����");
 
    $keys="";
 
    foreach($key as $v){
 
      $keys.=$v.",";
 
  
 
    }
 
    return rtrim($keys,",");
 
  }
 
  //����ֵ
 
  public function value($value){
 
    if(!is_array($value))die("�Ƿ�����");
 
    $strvalue="";
 
    foreach($value as $v){
 
      $strvalue.="'".$v."'".",";
 
    }
 
    return rtrim($strvalue,",");
 
  }
 
  
 
  //������
 
  public function add($filed){
 
    if(!is_array($filed)) die("�Ƿ�����");
 
    $fileds=$this->key(array_keys($filed)); //���������еļ���
 
    //var_dump($fileds);
 
    $values=$this->value(array_values($filed));
 
    $sql="insert into {$this->table}({$fileds})VALUES($values)";
 
    //var_dump($sql);
 
    return $this->querys($sql);
 
  }
 
  
 
  //���ҵ�����¼
 
  public function find($field,$id){
 
    $sql="select {$this->opt['field']} from {$this->table} {$this->where($field.'='."'".$id."'")}";
 
    var_dump($sql);
 
    return $this->fetch($sql);
 
  
 
  }
 
  //�������
 
  public function save($arrs){
 
    if(!is_array($arrs))die("�Ƿ�������");
 
    //if(empty($this->opt['where']))die("��������Ϊ��");
 
    $str="";
 
    while(list($k,$v)=each($arrs))
 
    {
 
      $str="{$k}="."'{$v}',";
 
    }
 
    $str=rtrim($str,",");
 
    $sql="Update {$this->table} set {$str}{$this->opt['where']}";
 
  
 
    return $this->querys($sql);
 
  
 
  
 
  }
 
  //��ȡ�ܼ�¼��
 
  public function counts(){
 
  
 
    $sql="select 'id' from {$this->table}{$this->opt['where']}";
 
    //var_dump($sql);
 
    return $this->querys($sql);
 
  }
 
  
 
  
 
}
 